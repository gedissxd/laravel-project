@props(['relatedProducts'])

<a href="/products/{{ $relatedProducts->id }}">
    <div class="bg-white rounded-lg h-full">
        <img src="{{ $relatedProducts->image }}" alt="{{ $relatedProducts->product_name }}"
            class="w-full h-48 object-cover rounded-t-lg">
        <div class="p-4">
            <p class="text-sm text-gray-500 mb-2">Made by {{ $relatedProducts->maker->name }}</p>
            @if($relatedProducts->tags)
                @foreach($relatedProducts->tags as $tag)
                    <x-tags>{{ $tag->name }}</x-tags>
                @endforeach
            @endif
            <h2 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-1 mt-3">{{ $relatedProducts->product_name }}</h2>
            <p class="text-sky-600 font-bold">${{ number_format($relatedProducts->price, 2) }}</p>
        </div>
    </div>
</a>
