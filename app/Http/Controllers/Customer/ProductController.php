<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts()
    {
        $topDealProducts = Product::where('is_top_deal', true)->published()->with('oldestImage')->get();

        $bestOfferProducts = Product::where('discount', '>', 0)->published()->with('oldestImage')->get();
        $topElectronics = Product::whereHas('category', function ($query) {
            $query->where('name', 'Phones & Tablets')->orWhere('name', "TVS & Audio");
        })->published()->with('oldestImage')->get();

        $categories = Category::pluck('name');

        return response()->json(['topDealProducts' => $topDealProducts, 'bestOfferProducts' => $bestOfferProducts, 'topElectronics' => $topElectronics, 'categories' => $categories]);
    }


    public function show(Product $product)
    {
        $product->load('images', 'variations', 'category', 'oldestImage');

        $groupedVariations = $product->variations->groupBy('type');

        $similarProducts = Product::whereHas('category', function ($query) use ($product) {
            $query->where('name', $product->category->name);
        })
            ->with('oldestImage')
            ->get();

        return view('customer.product-page', compact('product', 'similarProducts', 'groupedVariations'));
    }
}
