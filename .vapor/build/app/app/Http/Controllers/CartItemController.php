<?php

namespace App\Http\Controllers;


use App\Models\Product;



class CartItemController extends Controller
{
    public function index()
    {
        // Get the cart items from the session
        $carts = session()->get('carts',[]);
        
        return view('cart.index', [
            'carts' => $carts
        ]);
    }

    public function store(Product $products)
    {
        // Get the product id from the request
        $product_id = request()->input('product_id');
        // Find the product
        $products = Product::find($product_id);
        // Add product to cart
        $carts = session()->get('carts', []);
        $carts[$product_id] = [
            'name' => $products->product_name,
            'price' => $products->price,
            'image' => $products->image,
        ];
        session()->put('carts', $carts);
        return view('cart.index', ['carts' => $carts]);
    }

    public function destroy()
    {
    
    }

}