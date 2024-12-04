<x-layout>
    <div class="w-[700px] mx-auto p-4 mt-20">
        <div class="bg-white rounded-lg shadow-md p-6">
            <div class="flex justify-between border-b pb-4">
                <h2 class="text-lg font-semibold">Product</h2>
                <h2 class="text-lg font-semibold">Price</h2>
            </div>
            <div class="mt-4 space-y-4">
                @foreach($carts as $cart)
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-4">
                        <img src="{{ $cart['image'] }}" alt="{{ $cart['name'] }}" class="w-[40px] h-[40px] object-cover rounded-md">
                        <span>{{ $cart['name'] }}</span>
                    </div>
                    <span>${{ $cart['price'] }}</span>
                </div>
                @endforeach
                @php
                    $total = 0;
                    foreach($carts as $cart){
                        $total += $cart['price'];
                    }
                @endphp
            </div>
            <div class="mt-6 border-t pt-4">
                <div class="flex justify-between items-center">
                    <span class="font-semibold">Total</span>
                    <span class="font-semibold">${{ $total }}</span>
                </div>
            </div>
            <button class="mt-6 w-full bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600 transition duration-200">
                Checkout
            </button>
        </div>
    </div>
  
</x-layout>
