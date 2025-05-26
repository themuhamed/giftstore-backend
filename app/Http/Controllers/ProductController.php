<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with('category')->paginate(5);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'in_stock' => 'required|boolean',
            'manufature_date' => 'required|date',
            'main_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        $image_path = $request->file('main_image')->store('products', 'public');

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'in_stock' => $request->in_stock,
            'manufature_date' => $request->manufature_date,
            'main_image' => $image_path,
            'category_id' => $request->category_id,
        ]);

        noty('Product created successfully.');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::with('category')->findOrFail($id);
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:50',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'in_stock' => 'required|boolean',
            'manufature_date' => 'required|date',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|exists:categories,id'
        ]);

        if ($request->hasFile('main_image')) {
            if ($product->main_image) {
                Storage::disk('public')->delete($product->main_image);
            }

            $path = $request->file('main_image')->store('products', 'public');
            $product->main_image = $path;
        }

        $product->update([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'in_stock' => $request->in_stock,
            'manufature_date' => $request->manufature_date,
            'category_id' => $request->category_id,
            'main_image' => $product->main_image
        ]);

        noty('Product updated successfully!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        noty('Product deleted successfully!');
        return redirect()->route('products.index');
    }
}
