<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        $product = Product::where('slug', $slug)->first();

        $otherProducts = Product::where('slug', '!=', $slug)->get();

        return view('products', ['product' => $product, 'otherProducts' => $otherProducts]);
    }

    public function productAjax($id)
    {
        $product = Product::with(['category', 'images'])->find($id);

        return response()->json(['success' => true, 'data' => $product]);
    }
}
