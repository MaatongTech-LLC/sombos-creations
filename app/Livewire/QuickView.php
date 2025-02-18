<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class QuickView extends Component
{
    public $productId;
    public $product;
    public $quantity = 1;

    protected $listeners = ['showQuickView'];

    public function showQuickView($productId)
    {
        $this->productId = $productId;
        $this->product = Product::findOrFail($productId);
        $this->emit('openQuickViewModal'); // Open the modal
    }

    public function addToCart()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Add product to cart
        Cart::updateOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $this->productId],
            ['quantity' => $this->quantity]
        );

        $this->emit('cartUpdated'); // Notify other components
        $this->emit('toast', 'Product added to cart!');
    }

    public function addToWishlist()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Add product to wishlist
        Wishlist::firstOrCreate(
            ['user_id' => Auth::id(), 'product_id' => $this->productId]
        );

        $this->emit('wishlistUpdated'); // Notify other components
        $this->emit('toast', 'Product added to wishlist!');
    }

    public function checkout()
    {
        // Add product to cart and redirect to check out
        $this->addToCart();
        return redirect()->route('checkout');
    }

    public function render()
    {
        return view('livewire.quick-view');
    }
}
