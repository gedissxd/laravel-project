<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Models\Maker;
use Illuminate\Contracts\Database\Eloquent\Builder;

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
    public function show(Product $product)
    {

        $product->load(['maker', 'tags']);

        $relatedProducts = Product::query()
            ->with(['maker', 'tags'])
            ->whereHas('tags', function ($query) use ($product) {
                $query->whereIn('name', $product->tags->pluck('name'));
            })
            ->where('id', '!=', $product->id)
            ->take(5)
            ->get();

        return view('products.show', [
            'product' => $product,
            'relatedProducts' => $relatedProducts,
            'tags' => $product->tags
        ]);
    }
    
    public function store(Request $request)
    {
    $validated = $request->validate([
        'product_name' => ['required'],
        'description' => ['required'],
        'price' => ['required', 'numeric', 'min:0'],
        'image' => ['required'],
        'tags' => ['nullable'],
    ]);

    // Get the authenticated user
    $user = Auth::user();

    // Check if the user has a maker, if not create one
    $user->maker ?? Maker::create([
        'user_id' => $user->id,
        'name' => $user->maker_name,
    ]);

    // Create the product
    $product = $user->maker->products()->create(Arr::except($validated, 'tags'));

    // Handle tags if provided
    if ($validated['tags'] ?? false) {
        foreach (explode(",", $validated['tags']) as $tag) {
            $product->tag($tag); 
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
