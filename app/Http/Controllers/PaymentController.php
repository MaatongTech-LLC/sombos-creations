<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Payment;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Stripe\Charge;
use Stripe\Stripe;

// Example package


class PaymentController extends Controller
{
    public PaymentService $paymentService;
    public $items;
    public $subTotal = 0;
    public function __construct()
    {
        if (Auth::check()) {
            $this->items = Auth::user()->cart()->with('product')->get();
        } else {
            $this->items = collect(Session::get('cart', []));
        }
        $this->subTotal = 0;

        $this->paymentService = new PaymentService();
    }

    public function paypalOrder(Request $request)
    {

        $productId = $request->input('product_id');
        $quantity  = $request->input('quantity', 1);

        // Retrieve your product details
        $product = \App\Models\Product::findOrFail($productId);
        $amount  = $product->price * $quantity;

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $order = $provider->createOrder([
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
                "return_url" => route('paypal.success'),
                "cancel_url" => route('paypal.cancel'),
            ],
        ]);

        // Redirect user to PayPal approval URL
        foreach ($order['links'] as $link) {
            if ($link['rel'] === 'approve') {
                return redirect()->away($link['href']);
            }
        }

        return redirect()->back()->with('error', 'Something went wrong.');
    }

    public function success(Request $request)
    {

        // Capture the order details, process payment, update order status, etc.
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] === 'COMPLETED') {

           $this->updatePaymentStatus([
               'transaction_id' => $response['id'],
               'order_id' => $request->order_id,
               'payment_method' => 'PayPal'
               ]);
            toast('Payment Successful.',);

            return redirect()->route('my-account.account-details', $request->order_id);
        } else {
            toast('Something went wrong.', 'error');

        }
        return redirect()->route('home');
    }

    public function cancel(Request $request)
    {
        toast('Payment cancelled.', 'error');

        return redirect()->route('home');
    }

    public function stripeOrder(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'amount' => 'required',
        ]);
        // Set your secret key
        Stripe::setApiKey(config('services.stripe.secret'));

        // Get the token from the request
        $token = $request->stripeToken;
        $amount = $request->amount * 100;

        DB::beginTransaction();
        try {

            $order = Order::create([
                'user_id' => Auth::id(),
                'total_amount' => $request->amount,
                'shipping_address' => Auth::user()->address ?? 'Unknown',
            ]);

            foreach ($this->items as $item) {
                $order->items()->create([
                    'product_id' => $item->product->id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }
            DB::commit();

            $charge = Charge::create([
                'amount' => $amount,
                'currency' => 'usd',
                'description' => config('app.name') . ' - Order #' . $order->id,
                'source' => $token,
            ]);

            $this->updatePaymentStatus(
                [
                    'transaction_id' => $charge->id,
                    'order_id' => $order->id,
                    'payment_method' => 'Stripe',
                ]
            );

            // Payment was successful, process your order or store payment details here.
            toast('Payment successful.', 'success');

            return redirect()->route('my-account.orders.details', $order->id);

        } catch (\Exception $e) {
            DB::rollBack();

            flash($e->getMessage(), 'error');

            return back();
        }
    }

    public function updatePaymentStatus($data)
    {
        DB::beginTransaction();

        try {
            $order = Order::find($data['order_id']);
            $order->payment_status = 'paid';

            $order->save();

            Payment::create([
                'order_id' => $order->id,
                'amount' => $order->total_amount,
                'payment_method' => $data['payment_method'],
                'status' => 'completed',
                'transaction_id' => $data['transaction_id'],
            ]);

            foreach ($order->items as $item) {
                $item->product->update(['stock' => $item->product->stock - $item->quantity]);
            }

            Cart::where('user_id', Auth::id())->delete();

            DB::commit();

        } catch (\Exception $e) {

            DB::rollback();
            flash($e->getMessage(), 'error');
        }
    }
}
