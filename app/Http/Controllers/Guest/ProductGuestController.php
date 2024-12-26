<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductGuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function getProducts()
    {
        $topDealProducts = Product::where('is_top_deal', true)->with('oldestImage')->get();

        $bestOfferProducts = Product::where('discount', '>', 0)->with('oldestImage')->get();
        $topElectronics = Product::whereHas('category', function ($query) {
            $query->where('name', 'electronics');
        })->with('oldestImage')->get();

        $categories = Category::pluck('name');

        return response()->json(['topDealProducts' => $topDealProducts, 'bestOfferProducts' => $bestOfferProducts, 'topElectronics' => $topElectronics, 'categories' => $categories]);
    }

    public function cart()
    {
        return view('guest.cart');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('images', 'variations', 'category', 'oldestImage');

        $groupedVariations = $product->variations->groupBy('type');

        $similarProducts = Product::whereHas('category', function ($query) use ($product) {
            $query->where('name', $product->category->name);
        })
            ->with('oldestImage')
            ->get();

        return view('guest.product-page', compact('product', 'similarProducts', 'groupedVariations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
