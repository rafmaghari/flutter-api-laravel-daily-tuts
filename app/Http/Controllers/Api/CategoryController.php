<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategory;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{

    public function index()
    {
        return CategoryResource::collection(Category::select('id' ,'name')->get());
    }

    public function store(StoreCategory $request)
    {
//        $category = auth()->user()->categories()->create(($request->validated()));
//        return new CategoryResource($category);

        $category = Category::create($request->validated());

        return new CategoryResource($category);
    }


    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(StoreCategory $request, Category $category)
    {
        $category->update($request->validated());

        return new CategoryResource($category);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return response()->noContent();
    }
}
