<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Request $request, string $category)
    {
        return view('customer.category-products', compact('category'));
    }

    public function getCategoryProducts(string $category)
    {
        $products = Category::where('name', $category)->first()->products()->with('oldestImage')->paginate(24);

        return response()->json($products);
    }
}
