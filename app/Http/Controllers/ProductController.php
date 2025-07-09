<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return Inertia::render(
            'Product/Index',
            ['products' => $products]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Product/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric|between:0,999999.99',

        ]);

        Product::create($validated);

        return redirect()->route('products.index')->with('message', 'Product Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return Inertia::render('Product/Show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return Inertia::render(
            'Product/Edit',
            ['product' => $product]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|numeric|between:0,999999.99',
        ]);
        $product->update([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price
        ]);

        return redirect()->route('products.index')->with('message', 'Product Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('message', 'Product Successfully Deleted');
    }
}