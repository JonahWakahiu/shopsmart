<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Stripe\Stripe;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.products.index');
    }

    public function getProducts(Request $request)
    {
        $rowsPerPage = $request->query('rowsPerPage', 10);
        $q = $request->query('q');
        $filterByStatus = $request->query('filterByStatus');
        $filterByCategory = $request->query('filterByCategory');
        $filterByStock = $request->query('filterByStock');

        $products = Product::select('id', 'name', 'price', 'stock_quantity', 'status', 'sku', 'category_id', 'published_on')
            ->with(['category:id,name', 'oldestImage'])
            ->when($q, fn($query) => $query->where('name', 'like', "%$q%"))
            ->when($filterByStock, function ($query) use ($filterByStock) {
                $query->where('stock_quantity', $filterByStock == 'In Stock' ? '>' : '=', 0);
            })
            ->when($filterByStatus, fn($query) => $query->where('status', $filterByStatus))
            ->when($filterByCategory, function ($query) use ($filterByCategory) {
                $query->whereHas('category', fn($subQuery) => $subQuery->where('name', $filterByCategory));
            })
            ->orderBy('id', 'desc')
            ->paginate($rowsPerPage);

        $categories = Category::pluck('name');


        return response()->json(['success' => true, 'products' => $products, 'categories' => $categories], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categoryNames = Category::pluck('name');
        return view('admin.products.create', compact('categoryNames'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();


            $product = new Product();
            $product->name = $validated['name'];
            $product->sku = $validated['sku'];
            $product->barcode = $validated['barcode'];
            $product->description = $validated['description'];
            $product->short_description = $validated['short_description'];
            $product->stock_quantity = $validated['stock_quantity'];
            $product->price = $validated['price'];
            $product->discount = $validated['discount'];
            $product->status = $validated['status'];
            $product->published_on = array_key_exists('publish_on', $validated) ? $validated['publish_on'] : now();

            $category = Category::where('name', $validated['category'])->first();

            $product->category()->associate($category);
            $product->save();

            $variations = array_filter($validated['variations'] ?? [], function ($variation) {
                return !empty($variation['type']) && !empty($variation['value']);
            });

            if (!empty($variations)) {
                foreach ($variations as $variation) {
                    $product->variations()->create([
                        'type' => $variation['type'],
                        'value' => $variation['value'],
                        'price' => $variation['price'],
                        'stock_quantity' => $variation['stock_quantity'],
                    ]);
                }
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('images/products', 'public');

                    $product->images()->create(['url' => $imagePath]);
                }
            }

            if ($request->has('image_urls')) {
                foreach ($request->image_urls as $imageUrl) {
                    $product->images()->create(['url' => $imageUrl]);
                }
            }

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Product created successfully'], 200);

        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['success' => false, 'message' => $th->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product->load('images', 'variations', 'category');

        $groupedVariations = $product->variations->groupBy('type');

        $similarProducts = Product::whereHas('category', function ($query) use ($product) {
            $query->where('name', $product->category->name);
        })
            ->with('oldestImage')
            ->get();

        return view('admin.products.show', compact('product', 'similarProducts', 'groupedVariations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categoryNames = Category::pluck('name');
        $product->load('variations', 'category:id,name', 'images');

        return view('admin.products.edit', compact('product', 'categoryNames'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $product->name = $validated['name'];
            $product->sku = $validated['sku'];
            $product->barcode = $validated['barcode'];
            $product->description = $validated['description'];
            $product->short_description = $validated['short_description'];
            $product->stock_quantity = $validated['stock_quantity'];
            $product->price = $validated['price'];
            $product->discount = $validated['discount'];
            $product->status = $validated['status'];
            $product->published_on = array_key_exists('publish_on', $validated) ? $validated['publish_on'] : now();

            $category = Category::where('name', $validated['category'])->first();

            $product->category()->associate($category);
            $product->save();


            $variations = array_filter($validated['variations'] ?? [], function ($variation) {
                return !empty($variation['type']) && !empty($variation['value']);
            });

            if (!empty($variations)) {
                $variationIds = array_column($variations, 'id');

                // Delete variations that are not in the payload
                $product->variations()->whereNotIn('id', $variationIds)->delete();

                foreach ($variations as $variation) {
                    $product->variations()->updateOrCreate(
                        ['id' => $variation['id']],
                        [
                            'type' => $variation['type'],
                            'value' => $variation['value'],
                            'price' => $variation['price'],
                            'stock_quantity' => $variation['stock_quantity'],
                        ],
                    );
                }
            }

            $images = array_filter($validated['images'] ?? [], function ($image) {
                return !empty($image);
            });

            if (!empty($images)) {
                foreach ($images as $image) {
                    $imagePath = $image->store('images/products', 'public');
                    $product->images()->create(['url' => $imagePath]);
                }
            }

            $imageUrls = array_filter($validated['image_urls'] ?? [], function ($imageUrl) {
                return !empty($imageUrl);
            });

            if (!empty($imageUrls)) {
                foreach ($imageUrls as $imageUrl) {
                    $product->images()->create(['url' => $imageUrl]);
                }
            }

            DB::commit();

            $product->load('variations', 'category:id,name', 'images');

            return response()->json(['success' => true, 'message' => 'Product updated successfully', 'product' => $product], 200);

        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['success' => false, 'message' => 'Product update failed!', 'error' => $th->getMessage()], 500);
        }

    }

    private function syncVariations(Product $product, array $variations)
    {
        $variationIds = array_column($variations, 'variation_id');

        // Delete variations that are not in the payload
        $product->variations()->whereNotIn('id', $variationIds)->delete();

        foreach ($variations as $variation) {

            $product->varitions()->updateOrCreate(
                ['id' => $variation['variation_id']],
                [
                    'variation_type' => $variation['variation_type'],
                    'variation_value' => $variation['variation_value'],
                    'variation_price' => $variation['variation_price'],
                    'variation_stock_quantity' => $variation['variation_stock_quantity'],
                ],
            );

        }
    }

    public function updateStock(Request $request, Product $product)
    {
        $request->validate([
            'stock' => 'required|boolean',
        ]);

        $request->stock ? $product->stock_quantity = 1 : $product->stock_quantity = 0;

        $product->save();

        return response()->json(['success' => true], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();


        return response()->json(['success' => true, 'message' => 'Product deleted successfully'], 200);
    }

    public function destroyProductImage(Product $product, ProductImages $image)
    {
        $image->delete();

        $product->load('variations', 'category:id,name', 'images');

        return response()->json(['success' => true, 'message' => 'image deleted successfully', 'product' => $product], 200);
    }
}
