<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use App\Services\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public $items;
    public $subTotal;

    public PaymentService $paymentService;
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
    public function index()
    {

        return view('checkout', ['items' => $this->items, 'subTotal' => $this->subTotal]);
    }

    public function post(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'amount' => 'required',
            'payment_method' => 'required',
        ]);

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

                if ($request->payment_method == 'paypal') {
                    $paymentUrl = $this->paymentService->payWithPayPal($order);

                    return redirect()->away($paymentUrl);
                }
            } catch (\Exception $e) {
                DB::rollBack();

                toast('Something went wrong', 'error');

                return redirect()->back();
            }

    }
}
