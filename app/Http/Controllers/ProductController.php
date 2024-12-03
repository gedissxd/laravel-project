<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Maker;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['maker', 'tags'])->paginate(28);
        return view('products.index', [
            'products' => $products,
            'tags' => Tag::all(),
        ]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function show(Product $product )
    {
        $tags = $product->tags; 
        return view('products.show', compact('product', 'tags'));
    }
    
    public function store(Request $request)
{
    $attributes = $request->validate([
        'product_name' => 'required',
        'description' => 'required',
        'price' => 'required|numeric|min:0',
        'image' => 'required',
        'tags' => ['nullable'],
    ]);

    // Get the authenticated user
    $user = Auth::user();

    // Check if the user has a maker, if not create one
    $maker = $user->maker ?? Maker::create([
        'user_id' => $user->id,
        'name' => $user->maker_name,
    ]);

    // Create the product
    $product = $maker->products()->create(Arr::except($attributes, 'tags'));

    // Handle tags if provided
    if ($attributes['tags'] ?? false) {
        foreach (explode(",", $attributes['tags']) as $tag) {
            $product->tag(trim($tag)); // Trim to remove any extra spaces
        }
    }

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
            'image' => 'required'
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
