<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class SingleProduct extends Component

{
    use LivewireAlert;

    public $product;
    public $quantity = 1;
    public $isProcessing = false;
    protected  $listeners = [
        'increment' => 'increment',
        'decrement' => 'decrement',
        'deleteItem' => 'deleteItem',
    ];

    public function render()
    {
        return view('livewire.single-product');
    }

    public function addToCart()
    {
        if (Auth::check()) {
            Cart::updateOrCreate([
                'product_id' => $this->product->id,
                'user_id' => Auth::id(),
            ]);
        } else {
            $cart = Session::get('cart', []);
            if (isset($cart[$this->product->id])) {
                $this->alert('warning', 'Product already in the cart!');
                return;
            } else {
                $cart[$this->product->id] = [
                    'product_id' => $this->product->id,
                    'quantity' => 1,
                    'product' => Product::find($this->product->id),
                ];
            }
            $cart = collect($cart);
            Session::put('cart', $cart);
        }

        $this->dispatch('cart:updated');

        $this->alert('success', 'Product added to cart!');
    }

    public function addToWishlist()
    {
        if (!Auth::check()) {
            $this->alert('error', 'Please log in to add to wishlist');
            return;
        }

        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $this->product->id,
        ]);

        $this->dispatch('wishlist:updated', Wishlist::where('user_id', Auth::id())->count());

        $this->alert('success', 'Product added to wishlist');
    }

    public function increment()
    {
        if ($this->quantity === $this->product->stock) {
            $this->quantity = $this->product->stock;

            $this->alert('warning', 'Product stock limit reached!');
        } else {
            $this->quantity++;
        }

        $this->updateQuantity();

    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;

            $this->updateQuantity();
        }
    }

    public function updateQuantity()
    {
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())
                ->where('product_id', $this->product->id)
                ->update(['quantity' => $this->quantity]);
        } else {
            $cart = Session::get('cart', []);

            $cart[$this->product->id] = [
                'product_id' => $this->product->id,
                'quantity' => $this->quantity,
                'product' => Product::find($this->product->id),
            ];

            $cart = collect($cart);
            Session::put('cart', $cart);

        }

        $this->dispatch('cart:updated');
    }

    public function buyNow()
    {

        if (! Auth::check()) {
            $this->alert('error', 'Login to pay directly with Paypal');
            return;
        }
        // Calculate the total amount (for simplicity, product price * quantity)
        $amount = $this->product->price * $this->quantity;

        // Create a new instance of the PayPal client
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $order = Order::create([
            'user_id' => Auth::id(),
            'total_amount' => $amount,
            'shipping_address' => Auth::user()->address ?? 'Unknown',
        ]);

        $order->items()->create([
            'product_id' => $this->product->id,
            'quantity' => $this->quantity,
            'price' => $this->product->price,
        ]);

        // Create the order with required parameters
        $paypalOrder = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $amount,
                    ]
                ]
            ],
            "application_context" => [
                "return_url" => route('paypal.success', ['order_id' => $order->id]),
                "cancel_url" => route('paypal.cancel'),
            ],
        ]);

        // Look for the approval link in the order response
        $approvalUrl = null;
        foreach ($paypalOrder['links'] as $link) {
            if ($link['rel'] === 'approve') {
                $approvalUrl = $link['href'];
                break;
            }
        }

        if ($approvalUrl) {
            // Dispatch a browser event with the approval URL so JS can redirect the user

            $this->dispatch('redirectToPayPal', ['url' => $approvalUrl]);
        } else {
            // Dispatch an error event if something went wrong
            $this->alert('error', 'Unable to process your request!');
        }

        $this->isProcessing = true;
    }

}
