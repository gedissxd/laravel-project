<x-layout>
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md mt-20">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Add New Product</h1>
        <form class="space-y-4" method="POST" action="/products">
            @csrf
            <div>
                <x-label for="product_name">Product Name</x-label>
                <x-input type="text" id="product_name" name="product_name" required/>
            </div>
            <x-errors name="product_name"/>
            <div>
                <x-label for="description">Description</x-label>
                <x-textarea id="description" name="description" rows="3" required></x-textarea>
            </div>
            <x-errors name="description"/>
            <div>
                <x-label for="image">Product Image URL</x-label>
                <x-input type="text" id="image" name="image" required/>
            </div>
           <x-errors name="image"/>
            <div>
                <x-label for="price">Price</x-label>
                <div>
                    <x-input type="number" id="price" name="price" required/>
                </div>
            </div>
            <x-errors name="price"/>
            <div>
                <x-button type="submit" class="px-4 py-2">Add Product </x-button>
            </div>
        </form>
    </div>
</x-layout>
