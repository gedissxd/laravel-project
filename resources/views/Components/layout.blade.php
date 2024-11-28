<!DOCTYPE html>
<html lang="en" class="bg-gray-600 flex flex-col">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen ">

    <div class="flex justify-center sticky top-0 z-50">
        <nav class=" bg-sky-500/90 w-full h-[50px] flex justify-center items-center border-b-1 shadow-sm shadow-white/50 border-white-500 backdrop-blur-sm">
            <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
            <x-nav-link href="/products" :active="request()->is('products')">Products</x-nav-link>
            <x-nav-link href="/cart" :active="request()->is('cart')">Cart</x-nav-link>
        </nav>
    </div>      
    <div class="flex justify-center w-full">
        {{ $slot }}
    </div>

    <footer class="bg-sky-500/90 h-20 flex justify-center items-center mt-auto ">
    </footer>
</body>
</html>
