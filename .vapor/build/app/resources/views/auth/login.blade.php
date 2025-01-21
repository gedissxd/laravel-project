<x-layout>
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md mt-20">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Login</h1>
        <form class="space-y-4" method="POST" action="/login">
            @csrf
            <div>
                <x-label for="email">Email</x-label>
                <x-input type="text" id="email" name="email" :value="old('email')" required />
            </div>
            <x-errors name="email" />
            <div>
                <x-label for="password">Password</x-label>
                <x-input type="password" id="password" name="password" required />
            </div>
            <x-errors name="password" />
            <button type="submit"
                class="w-full flex justify-center py-2 px-4 rounded-md shadow-xs text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 ">Login</button>
        </form>
    </div>
</x-layout>
