<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\ParentController;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\UpdateStockRequest;
use App\Http\Resources\Product\ProductDataResource;
use App\Http\Resources\Product\SingleProductDataResource;
use App\Http\Resources\Ratings\RatingDataResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Review;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Inertia\Inertia;
use Spatie\QueryBuilder\QueryBuilder;

class ProductController extends ParentController
{
    public function index()
    {
        return Inertia::render('Admin/Product/index', [
            'categories' => Category::all(),
        ]);
    }

    public function all(Request $request)
    {
        $query = Product::orderBy('id', 'desc');

        if ($request->filled('search_sku')) {
            $query->where('sku', 'like', '%' . $request->search_sku . '%');
        }

        if ($request->filled('search_name')) {
            $search = strtolower($request->search_name);
            $query->whereRaw('LOWER(name) LIKE ?', ['%' . $search . '%']);
        }

        if ($request->filled('search_category')) {
            $query->where('category_id', $request->search_category);
        }

        if ($request->filled('search_status')) {
            $query->where('status', $request->search_status);
        }

        $payload = $query->paginate($request->input('per_page', config('basic.pagination_per_page')));
        return ProductDataResource::collection($payload);
    }

    public function create()
    {
        return Inertia::render('Admin/Product/create', [
            'categories' => Category::all(),
            'brands' => Brand::with('categories:id,name')->get(),
        ]);
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? '',
            'sku' => $validated['sku'],
            'cost_price' => $validated['cost_price'] ?? 0,
            'selling_price' => $validated['selling_price'] ?? 0,
            'product_discount' => $validated['product_discount'] ?? 0,
            'category_id' => $validated['category_id'],
            'brand_id' => $validated['brand_id'] ?? null,
        ]);

        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $primaryIndex = (int) $request->input('primary_image', 0);

            foreach ($images as $index => $imageFile) {
                $imageName = Str::random(20) . '.' . $imageFile->getClientOriginalExtension();
                $imageFile->move(public_path('uploads/products'), $imageName);

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => 'uploads/products/' . $imageName,
                    'is_primary' => $index === $primaryIndex ? 1 : 0,
                    'sort_order' => $index + 1,
                ]);
            }
        }

        return;
    }

    public function get(int $id)
    {
        $product = Product::find($id);

        return $product;
    }

    public function changeStatus($id)
    {
        $product = Product::findOrFail($id);
        $product->status = $product->status === 'active' ? 'inactive' : 'active';
        $product->save();

        return;
    }

    public function edit($id)
    {
        $product = Product::with('images')->findOrFail($id);
        return Inertia::render('Admin/Product/edit', [
            'productData' => $product,
            'categories' => Category::all(),
            'brands' => Brand::with('categories')->get(),
        ]);
    }

    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $validated = $request->validated();

        $product->update([
            'name' => $validated['name'],
            'sku' => $validated['sku'],
            'description' => $validated['description'] ?? '',
            'cost_price' => $validated['cost_price'] ?? 0,
            'selling_price' => $validated['selling_price'] ?? 0,
            'product_discount' => $validated['product_discount'] ?? 0,
            'category_id' => $validated['category_id'],
            'brand_id' => $validated['brand_id'] ?? null,
        ]);

        // Handle keeping and deleting existing images
        $keepImages = json_decode($request->input('keep_images', '[]'), true);
        $existingImages = $product->images;

        foreach ($existingImages as $image) {
            if (!in_array($image->id, $keepImages)) {
                // Delete file from storage if needed
                $imagePath = public_path($image->image_path);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
                $image->delete();
            }
        }

        $primaryIndex = (int) $request->input('primary_image', 0);
        $currentImagePosition = 0;

        // Reindex remaining images and update primary
        foreach ($product->images()->orderBy('sort_order')->get() as $img) {
            $img->is_primary = $currentImagePosition === $primaryIndex ? 1 : 0;
            $img->sort_order = $currentImagePosition + 1;
            $img->save();
            $currentImagePosition++;
        }

        // Handle new image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $imageName = Str::random(20) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/products'), $imageName);

                $product->images()->create([
                    'image_path' => 'uploads/products/' . $imageName,
                    'is_primary' => $currentImagePosition === $primaryIndex ? 1 : 0,
                    'sort_order' => $currentImagePosition + 1,
                ]);

                $currentImagePosition++;
            }
        }

        return;
    }

    public function stockUpdate(UpdateStockRequest $request, int $id)
    {
        $product = Product::findOrFail($id);

        if ($request['transaction_type_id'] == 1) {
            $productData['stock_quantity'] = $product->stock_quantity + $request['quantity'];
        } else {
            $productData['stock_quantity'] = $product->stock_quantity - $request['quantity'];
        }

        $product->update($productData);
    }

    public function reviews(int $id)
    {
        $product = Product::findOrFail($id);
        return Inertia::render('Admin/Product/reviews', [
            'product' => $product,
        ]);
    }

    public function allReviews(Request $request, $id)
    {
        $query = Review::where('product_id', $id)->orderBy('id', 'desc');

        if ($request->filled('search_rating')) {
            $query->where('rating', $request->search_rating);
        }

        $payload = $query->paginate($request->input('per_page', config('basic.pagination_per_page')));
        return RatingDataResource::collection($payload);
    }

    public function reviewDestroy($id)
    {
        $review = Review::findOrFail($id);
        return $review->delete();
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        return $product->delete();
    }

}
