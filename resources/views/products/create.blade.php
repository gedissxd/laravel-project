<x-layout>
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md mt-5">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Add New Product</h1>
        <form class="space-y-4" method="POST" action="/products">
            @csrf
            <div>
                <label for="product_name" class="block text-sm font-medium text-gray-700">Product Name</label>
                <input type="text" id="product_name" name="product_name" required
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-xs focus:outline-hidden focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            @error('product_name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea id="description" name="description" rows="3" required
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-xs focus:outline-hidden focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Product Image URL</label>
                <input type="text" id="image" name="image" required
                    class="mt-1 block w-full px-3 py-2 bg-white border border-gray-300 rounded-md shadow-xs focus:outline-hidden focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                <div class="mt-1 relative rounded-md shadow-xs">

                    <input type="number" id="price" name="price" min="0" step="0.01" required
                        class="block w-full pl-4 pr-2 py-2 bg-white border border-gray-300 rounded-md shadow-xs focus:outline-hidden focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
            @error('price')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <div>
                <button type="submit"
                    class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-xs text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-hidden focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Add Product
                </button>
            </div>
        </form>
    </div>
</x-layout>
