@props(['product', 'tags'])

<a href="/products/{{ $product['id'] }}">
    <div class="bg-white rounded-lg h-full">
        <img src="{{ $product['image'] }}" alt="{{ $product['product_name'] }}"
            class="w-full h-48 object-cover rounded-t-lg">
        <div class="p-4">
            <p class="text-sm text-gray-500 mb-2">Made by {{ $product->maker->name }}</p>
            @foreach ($product->tags as $tag)
                <x-tags>{{ $tag->name }}</x-tags>
            @endforeach
            <h2 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-1 mt-3">{{ $product['product_name'] }}</h2>
            <p class="text-sky-600 font-bold">${{ number_format($product['price'], 2) }}</p>
        </div>
    </div>
</a>
