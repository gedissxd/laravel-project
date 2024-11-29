<x-layout>
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md mt-20">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Register</h1>
        <form class="space-y-4" method="POST" action="/products">
            @csrf
            <div>
                <x-label for="product_name">Username</x-label>
                <x-input type="text" id="product_name" name="product_name" required/>
            </div>
            <x-errors name="product_name"/>
                        <div>
                <x-label for="product_name">Password</x-label>
                <x-input type="text" id="product_name" name="product_name" required/>
            </div>
            <x-errors name="product_name"/>
                        <div>
                <x-label for="product_name">Email</x-label>
                <x-input type="text" id="product_name" name="product_name" required/>
            </div>
            <x-errors name="product_name"/>
                        <div>
                <x-label for="product_name">Confirm Email</x-label>
                <x-input type="text" id="product_name" name="product_name" required/>
            </div>
            <x-errors name="product_name"/>
            <x-button type="submit" class="py-2 px-4">Register User</x-button>
        </form>
    </div>
</x-layout>
