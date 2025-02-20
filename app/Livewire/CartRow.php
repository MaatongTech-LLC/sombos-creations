<?php

namespace App\Livewire;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class CartRow extends Component
{
    use LivewireAlert;

    public $item;
    public $quantity = 1;

    protected  $listeners = [
        'increment' => 'increment',
        'decrement' => 'decrement',
        'deleteItem' => 'deleteItem',
    ];

    public function increment()
    {
        if ($this->quantity === $this->item->product->stock) {
            $this->quantity = $this->item->product->stock;

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
    public function deleteItem()
    {
        if (Auth::check()) {
            $this->item->delete();
        } else {
            $cart = collect(Session::get('cart', []));
            $cart->forget($this->item->product_id);

            Session::put('cart', $cart);        }
        $this->alert('success', 'Item has been deleted!');
        $this->dispatch('cart:updated');

    }

    public function updateQuantity()
    {
        $this->item->quantity = $this->quantity;

        if (Auth::check()) {
            Cart::where('user_id', Auth::id())
                ->where('product_id', $this->item->product->id)
                ->update(['quantity' => $this->quantity]);
        } else {
            $cart = Session::get('cart', []);

            $cart[$this->item->product->id] = [
                'product_id' => $this->item->product->id,
                'quantity' => $this->quantity,
                'product' => Product::find($this->item->product->id),
            ];

            $cart = collect($cart);
            Session::put('cart', $cart);

        }

        $this->dispatch('cart:updated');
    }

    public function render()
    {
        return view('livewire.cart-row');
    }
}
