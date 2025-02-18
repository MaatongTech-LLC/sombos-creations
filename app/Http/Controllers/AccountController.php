<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function index()
    {
        return view('my-account.index');
    }

    public function orders()
    {
        $orders = Order::where('user_id', Auth::id())->with('items')->latest()->get();

        return view('my-account.orders', ['orders' => $orders]);
    }

    public function orderDetails($id)
    {
        $order = Order::with(['items', 'user', 'couponUsages'])->where('user_id', Auth::id())->findOrFail($id);

        return view('my-account.order-details', ['order' => $order]);
    }

    public function accountDetails()
    {
        return view('my-account.account-details');
    }

    public function address()
    {
        return view('my-account.address');
    }

    public function wishlist()
    {
        $wishlists = Wishlist::where('user_id', Auth::id())->with('product')->paginate(3);

        return view('my-account.wishlist', ['wishlists' => $wishlists]);
    }
}
