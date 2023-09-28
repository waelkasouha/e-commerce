<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(15);

        return ProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string',
            'slug_name' => 'required|string|unique:products,slug',
            'description' => 'required|text',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new product
        $product = new Product();
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->quantity = $request->input('quantity');

        // Upload the cover image
        $coverImage = $request->file('cover_image');
        $coverImageName = uniqid() . '.' . $coverImage->getClientOriginalExtension();
        $coverImage->storeAs('products/covers', $coverImageName);

        // Set the cover image name
        $product->cover_image = $coverImageName;

        // Save the product
        $product->save();

        // Upolad Products Images
        // foreach ($request->file('images') as $image) {
        //     $path = uploadImage('products/images', $image);
        //     $product->images()->update([
        //          'url' => $path,
        //     ]);
        // }

        // Redirect to the product list page
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);

        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        // if ($product) {
        //     if ($request->hasFile('cover_image')) {
        //         //delete old cover
        //         deleteImage($product->cover_image);
        //         //upload new cover
        //         uploadImage('products/images', $request->file('cover_image'));
        //     }
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete($id);
    }
}
