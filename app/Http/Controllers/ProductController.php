<?php

namespace App\Http\Controllers;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('maker')->paginate(28);
        return view('products.index', ['products' => $products]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }
    public function store()
    {
        request()->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'required',
        ]);

        Product::create([
            'product_name' => request('product_name'),
            'description' => request('description'),
            'price' => request('price'),
            'maker_id' => 1,
            'image' => request('image'),
        ]);
        return redirect('/products');
    }
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product]);
    }
    public function update(Product $product)
    {

        request()->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'required',
        ]);

        $product->update([
            'product_name' => request('product_name'),
            'description' => request('description'),
            'price' => request('price'),
            'image' => request('image'),
        ]);
        return redirect('/products/' . $product->id);
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}
