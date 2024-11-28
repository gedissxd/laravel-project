<x-layout>
    <div class="container mx-auto p-4 max-w-2xl mt-53.5">
        <div class="bg-white rounded-lg  p-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b">
                        <th class="text-left pb-4">Product</th>
                        <th class="text-center pb-4">Quantity</th>
                        <th class="text-right pb-4">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b" data-id="1">
                        <td class="py-4">
                            <div class="flex items-center">
                                <img src="https://via.placeholder.com/50" alt="Product 1" class="mr-4">
                                <span class="font-semibold">Product 1</span>
                            </div>
                        </td>
                        <td class="text-center py-4">
                            <div class="flex items-center justify-center">
                                <button class="bg-gray-200 px-2 py-1">-</button>
                                <span class="quantity mx-2">2</span>
                                <button class=" bg-gray-200 px-2 py-1">+</button>
                            </div>
                        </td>
                        <td class="text-right py-4 ">$<span class="price">19.99</span></td>
                        <td class="text-right py-4">
                            <svg class="ml-1 hover:text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash-2"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/><line x1="10" x2="10" y1="11" y2="17"/><line x1="14" x2="14" y1="11" y2="17"/></svg>
                        </td>

                    </tr>
                </tbody>
            </table>
            <div >
                <div class="flex justify-between items-center">
                    <span class="font-semibold text-lg mt-4">Total:</span>
                    <span class="font-bold text-xl mt-4">$114.95</span>
                </div>
            </div>
            <div class="mt-6">
                <x-button class="px-4 py-2">
                    Proceed to Checkout
                </x-button>
            </div>
        </div>
    </div>

</x-layout>
