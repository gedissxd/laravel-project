
<x-layout>
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md mt-5">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Edit Product: {{ $product->product_name }}</h1>
        <form class="space-y-4" method="POST" action="/products/{{ $product->id }}">
            @csrf
            @method('PATCH')
            <div>
                <x-label for="product_name">Product Name</x-label>
                <x-input type="text" id="product_name" name="product_name" required
                    value="{{ $product->product_name }}" />
            </div>
            <x-errors name="product_name" />
            <div>
                <x-label for="description">Description</x-label>
                <textarea id="description" name="description" rows="3" required
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-xs focus:outline-hidden focus:ring-indigo-500 focus:border-indigo-500">
                {{ $product->description }}
            </textarea>
            </div>
            <x-errors name="description" />
            <div>
                <x-label for="image">Product Image URL</x-label>
                <x-input type="text" id="image" name="image" required value="{{ $product->image }}" />
            </div>
            <x-errors name="image" />
            <div>
                <x-label for="price">Price</x-label>
                <x-input type="number" id="price" name="price" required value="{{ $product->price }}" />
            </div>
            <x-errors name="price" />
            <div>
                <x-label for="tags">Tags</x-label>
                <x-input type="text" id="tags" name="tags" required value="{{ $product->tags->pluck('name')->implode(',') }}" />
            </div>
            <x-errors name="tags" />
            <div>
                <x-button class="py-2 px-4 mb-4" href="/products/{{ $product->id }}">
                    Cancel
                </x-button>
                <button
                    class="w-full flex justify-center py-2 px-4  rounded-md shadow-xs text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 ">
                    Update Product
                </button>
                <button form="deleteProduct"
                    class="w-full flex justify-center py-2 px-4 mt-4  rounded-md shadow-xs text-sm font-bold text-white bg-red-500 hover:bg-red-600 ">
                    Delete Product
                </button>
            </div>
        </form>
        <form class="hidden" method="POST" action="/products/{{ $product->id }}" id="deleteProduct">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-layout>