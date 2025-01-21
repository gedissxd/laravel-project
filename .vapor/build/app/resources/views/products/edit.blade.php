
<x-layout>
    <div class="w-full max-w-md p-8 mt-5 bg-white rounded-lg shadow-md">
        <h1 class="mb-6 text-2xl font-bold text-center text-gray-800">Edit Product: {{ $product->product_name }}</h1>
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
                    class="block w-full px-3 py-2 mt-1 bg-white border border-gray-300 rounded-md shadow-xs focus:outline-hidden focus:ring-indigo-500 focus:border-indigo-500">
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
                <x-label for="tags">Tags (comma separated)</x-label>
                <x-input type="text" id="tags" name="tags" required value="{{ $product->tags->pluck('name')->implode(',') }}" />
            </div>
            <x-errors name="tags" />
            <div>
                <x-button class="px-4 py-2 mb-4" href="/products/{{ $product->id }}">
                    Cancel
                </x-button>
                <button
                    class="flex justify-center w-full px-4 py-2 text-sm font-bold text-white bg-indigo-600 rounded-md shadow-xs hover:bg-indigo-700 ">
                    Update Product
                </button>
                <button form="deleteProduct"
                    class="flex justify-center w-full px-4 py-2 mt-4 text-sm font-bold text-white bg-red-500 rounded-md shadow-xs hover:bg-red-600 ">
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