<x-layout>
    <div class="container mx-auto px-4 py-12">
        
        <div class="flex flex-col md:flex-row gap-20">
            <div>
                <img src="{{ $product['image'] }}" alt="{{ $product['product_name'] }}"
                    class="w-full h-[550px] object-cover rounded-2xl">
            </div>
            <div class="md:w-1/2 space-y-6">
                <h2 class="text-4xl font-bold text-gray-900">{{ $product['product_name'] }}</h2>
                <p class="text-gray-900 text-lg ">{{ $product['description'] }}</p>

                <p class="text-sm text-gray-500 font-medium">Made by {{ $product->maker->name }}</p>
                <p class="text-3xl font-bold text-gray-900">${{ number_format($product['price'], 2) }}</p>
                <x-button class="mt-4 w-[100px] py-4" href="/cart/{{ $product->id }}">Add to cart</x-button>
            </div>
        </div>

        <x-button class="mt-4 w-[100px] py-2" href="/products/{{ $product['id'] }}/edit">Edit Product</x-button>
        <div class="mt-24">
            <h3 class="text-3xl font-bold text-gray-900 mb-8">Related Products</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                @for($i = 0; $i < 5; $i++)
                <a href="/products/{{ $product['id'] }}" class="group">
                    <div class="bg-white rounded-xl overflow-hidden">
                        <img src="{{ $product['image'] }}" alt="{{ $product['product_name'] }}" 
                             class="w-full h-56 object-cover">
                        <div class="p-4">
                            <h4 class="font-semibold text-gray-900 mb-2 group-hover:text-indigo-600 transition duration-300">{{ $product['product_name'] }}</h4>
                            <p class="text-indigo-600 font-bold">${{ number_format($product['price'], 2) }}</p>
                        </div>
                    </div>
                </a>
                @endfor
            </div>
        </div>
    </div>
</x-layout>