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
        $products = Product::with(['maker', 'tags'])->latest()->paginate(28);
        return view('products.index', [
            'products' => $products,
        ]);
    }
    public function create()
    {
        return view('products.create');
    }
    public function show(Product $product)
    {
        $product->load(['maker', 'tags']);
        $relatedProducts = Product::with(['maker', 'tags'])
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

        $user = Auth::user();

        // Create the product
        $product = $user->maker->products()->create(Arr::except($validated, 'tags'));
        foreach (explode(",", $validated['tags']) as $tag) {
            $product->tag($tag);
        }

        return redirect('/products');
    }
    public function edit(Product $product)
    {
        return view('products.edit', ['product' => $product,]);
    }
    public function update(Product $product)
    {

        request()->validate([
            'product_name' => 'required',
            'description' => 'required',
            'price' => 'required|numeric|min:0',
            'image' => 'required',
            'tags' => 'required',
        ]);

        $product->update([
            'product_name' => request('product_name'),
            'description' => request('description'),
            'price' => request('price'),
            'image' => request('image'),

        ]);

        $product->tags()->detach();
        foreach (explode(',', request('tags')) as $tag) {
            $product->tag($tag);
        }


        return redirect('/products/' . $product->id);
    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }
}