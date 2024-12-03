<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;



class CartItemController extends Controller
{
    public function index()
    {
        return view('cart');
    }

    public function store(Product $product)
    {
        return view('cart');
    }

    public function destroy(CartItem $cartItem)
    {
    
    }

    public function updateQuantity(CartItem $cartItem, Request $request)
    {
     
    }
}