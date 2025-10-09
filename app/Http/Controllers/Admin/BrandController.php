<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreBrandRequest;
use App\Http\Resources\Brand\BrandDataResource;
use App\Models\Brand;
use App\Models\BrandCategory;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function all(Request $request, $category_id)
    {
        $query = Brand::whereHas('categories', function ($q) use ($category_id) {
            $q->where('category_id', $category_id);
        })->orderBy('name', 'asc');

        if ($request->filled('search_name')) {
            $query->where('name', 'like', '%' . $request->search_name . '%');
        }

        $payload = $query->paginate($request->input('per_page', config('basic.pagination_per_page')));

        return BrandDataResource::collection($payload);
    }

    public function store(StoreBrandRequest $request, Category $category)
    {

        $brand = Brand::where('name', $request->name)->first();

        if (!$brand) {
            $brand = Brand::create([
                'name' => $request->name,
            ]);
        }

        if (!$brand->categories()->where('category_id', $category->id)->exists()) {
            $brand->categories()->attach($category->id);
        }

        return;
    }

    public function detach(Category $category, Brand $brand)
    {
        $brand_category = BrandCategory::where('category_id', $category->id)->where('brand_id', $brand->id)->first();
        $brand_category->delete();
        return;
    }
}
