<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartItemController extends Controller
{
    public function index()
    {
    

        return view('cart.index');
    }

    public function store(Product $products)
    {
        $productId = request()->input('product_id');
        $products = Product::find($productId);
        // Add product to cart
        $carts = session()->get('carts', []);
        $carts[$productId] = [
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

    public function updateQuantity(CartItem $cartItem, Request $request)
    {
     
    }
}