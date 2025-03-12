<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\Models\Collection;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::withCount(['orderItems as total_sold' => function ($query) {
            $query->select(\DB::raw('SUM(quantity)'));
        }])
            ->orderBy('total_sold', 'desc')
            ->limit(16) // Limit to 16 products
            ->get();
        $collections = Collection::with(['products'])->latest()->get()->take(12);

        $categories = Category::with(['products'])->latest()->get()->take(12);


        // Fetch new arrival products (products created in the last 30 days)
        $newArrivals = Product::where('created_at', '>=', now()->subDays(30))
            ->orderBy('created_at', 'desc')
            ->get();


        return view('home', [
            'products' => $products,
            'collections' => $collections,
            'newArrivals' => $newArrivals,
            'categories' => $categories,

        ]);
    }

    public function products($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $previousProduct = Product::where('id', '<', $product->id)->orderBy('id', 'desc')->first();
        $nextProduct = Product::where('id', '>', $product->id)->orderBy('id', 'asc')->first();

        $otherProducts = Product::where('slug', '!=', $slug)->get();

        $images = ProductImage::where('product_id', $product->id)->get();

        return view('products', [
            'product' => $product,
            'otherProducts' => $otherProducts,
            'previousProduct' => $previousProduct,
            'nextProduct' => $nextProduct,
            'images' => $images,
        ]);
    }

    public function productAjax($id)
    {
        $product = Product::with(['category', 'images'])->find($id);

        return response()->json(['success' => true, 'data' => $product]);
    }
}
