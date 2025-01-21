<!DOCTYPE html>
<html lang="en" class="bg-gray-500 flex flex-col">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex flex-col min-h-screen ">

    <div class="sticky top-0 z-50">
        <nav
            class="font-bold text-white bg-sky-500/90 w-full h-[50px] border-b shadow-md  backdrop-blur-sm">
            <div class="mx-auto flex items-center justify-between h-full px-4">

                <div class="flex space-x-3">
                    <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                    <x-nav-link href="/products" :active="request()->is('products')">Products</x-nav-link>
                    <x-nav-link href="/cart" :active="request()->is('cart')">Cart</x-nav-link>
                </div>
                @guest
                    <div class="flex  space-x-3">
                        <x-nav-link href="/login" :active="request()->is('login')">Login</x-nav-link>
                        <x-nav-link href="/register" :active="request()->is('register')">Register</x-nav-link>
                    </div>
                @endguest
                @auth
                    <form action="/logout" method="POST">
                        @csrf
                        <button class="hover:text-gray-300">Logout</button>
                    </form>
                @endauth
            </div>
        </nav>
    </div>


    <div class="flex justify-center w-full">
        {{ $slot }}
    </div>

    <footer class="bg-sky-500/90 h-20 flex justify-center items-center mt-auto shadoow-md border-t">
    </footer>
</body>

</html>
