<x-layout>
    <div class="mx-auto px-4 py-12 max-w-[1300px]">

        <div class="flex gap-20">
            <div>
                <img src="{{ $product['image'] }}" alt="{{ $product['product_name'] }}"
                    class="w-[600px] h-[550px] object-cover rounded-2xl">
            </div>
            <div class="w-[600px] space-y-6">
                <h2 class="text-4xl font-bold text-gray-900">{{ $product['product_name'] }}</h2>
                <p class="text-lg text-gray-900 ">{{ $product['description'] }}</p>
                @foreach ($tags as $tag)
                    <x-tags>{{ $tag->name }}</x-tags>
                @endforeach

                <p class="text-sm font-medium text-gray-700">Made by {{ $product->maker->name }}</p>
                <p class="text-3xl font-bold text-gray-900">${{ number_format($product['price'], 2) }}</p>
                <form action="/cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit"
                        class="mt-4 w-[100px] py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-md">
                        Add to cart
                    </button>
                </form>
            </div>
        </div>
        @can('edit', $product)
            <x-button class="mt-4 w-[100px] py-2" href="/products/{{ $product['id'] }}/edit">Edit Product</x-button>
        @endcan
        <div class="mt-24">
            <h3 class="mb-8 text-3xl font-bold text-gray-900">Related Products</h3>
            <div class="grid grid-cols-5 gap-8">
                @foreach ($relatedProducts as $relatedProduct)
                    <x-related-product-block :relatedProducts="$relatedProduct" />
                @endforeach

            </div>
        </div>
    </div>
</x-layout>
