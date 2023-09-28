<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = SubCategory::all();
        return response()->json($subCategories);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $subCategory = SubCategory::create($request->only(['name', 'category_id']));
        return response()->json($subCategory, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        return response()->json($subCategory);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
    
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->update($request->only(['name', 'category_id']));
        return response()->json($subCategory);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();
        return response()->json(null, 204);
    }

    public function getSubCategoriesByCategory(Category $category)
    {
        $subCategories = $category->subCategories;
        return response()->json($subCategories);
    }
}
