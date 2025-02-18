<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attribute;
use App\Models\Collection;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $collections = Collection::all();

        // Start with all products
        $products = Product::query();

        // Filter by category if a category is selected
        if ($request->has('category') && $request->category != 'all') {
            $products->where('category_id', $request->category);
        }

        // Filter by collection if a collection is selected
        if ($request->has('collection') && $request->collection != 'all') {
            $products->whereHas('collections', function ($query) use ($request) {
                $query->where('collections.slug', $request->collection);
            });
        }

        $inStockCount = (clone $products)->where('stock', '>', 0)->count();
        $outOfStockCount = (clone $products)->where('stock', '<=', 0)->count();

        // Paginate the results
        $products = $products->paginate(12); // 12 products per page

        return view('shop', ['products' => $products, 'categories' => $categories, 'collections' => $collections, 'inStockCount' => $inStockCount, 'outOfStockCount' => $outOfStockCount]);
    }


    public function collections()
    {
        return view('collections', [
            'collections' => Collection::latest()->paginate(12),
        ]);
    }
}
