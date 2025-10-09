<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\Category\CategoryDataResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function all(Request $request)
    {
        $query = Category::orderBy('name', 'asc');

        if ($request->filled('search_name')) {
            $query->where('name', 'like', '%' . $request->search_name . '%');
        }

        $payload = $query->paginate($request->input('per_page', config('basic.pagination_per_page')));
        return CategoryDataResource::collection($payload);
    }

    public function store(StoreCategoryRequest $request)
    {
        Category::create([
            'name' => $request['name']
        ]);

        return;
    }

    public function edit($id)
    {
        return Category::findOrFail($id);
    }

    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->update($request->validated());

        return;
    }
}
