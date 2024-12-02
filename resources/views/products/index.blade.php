<x-layout>
    <div class="mx-auto px-4 py-8 max-w-[1300px]">
        <x-button class="w-[200px] p-4 mb-5" href="/products/create">Create Product</x-button>
        <div class="grid lg:grid-cols-4 gap-6 md:grid-cols-2 ">
            @foreach ($products as $product)
            <x-product-block :product="$product"/>
            @endforeach
        </div>
        <div class="mt-8 flex justify-center">
            {{ $products->links() }}
        </div>
    </div>
</x-layout>
