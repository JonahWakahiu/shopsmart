<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.categories.index');
    }

    public function getCategories(Request $request)
    {
        $q = $request->query('q', '');
        $rowsPerPage = $request->query('rowsPerPage', '');

        $categories = Category::withCount('products')
            ->when($q, function ($query) use ($q) {
                $query->where('name', 'like', "%$q%");
            })
            ->paginate($rowsPerPage);

        $categories->map(function ($category) {
            $category->total_earnings = $category->totalEarnings();
            return $category;
        });

        return response()->json($categories);
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
        $validated = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
        ]);

        try {
            $category = new Category();

            $category->name = $validated['name'];
            $category->slug = $validated['slug'];
            $category->save();

            return response()->json(['success' => true, 'message' => 'New category added successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'slug' => 'required|string',
        ]);

        try {
            $category->name = $validated['name'];
            $category->slug = $validated['slug'];
            $category->save();

            return response()->json(['success' => true, 'message' => 'Category updated successfully'], 200);
        } catch (\Throwable $th) {
            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->json(['success' => true, 'message' => 'Category deleted successfully'], 200);
    }
}
