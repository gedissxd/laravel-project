<x-layout>
    <div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md mt-20">
        <h1 class="text-2xl font-bold mb-6 text-center text-gray-800">Register</h1>
        <form class="space-y-4" method="POST" action="/products">
            @csrf
            <div>
                <x-label for="name">Username</x-label>
                <x-input type="text" id="name" name="name" required/>
            </div>
            <x-errors name="name"/>
                        <div>
                <x-label for="password">Password</x-label>
                <x-input type="password" id="password" name="password" required/>
            </div>
            <x-errors name="password"/>
                        <div>
                <x-label for="email">Email</x-label>
                <x-input type="email" id="email" name="email" required/>
            </div>
            <x-errors name="email"/>
                        <div>
                <x-label for="email_confirmation">Confirm Email</x-label>
                <x-input type="email" id="email_confirmation" name="email_confirmation" required/>
            </div>
            <x-errors name="email"/>
            <button type="submit" class="w-full flex justify-center py-2 px-4  rounded-md shadow-xs text-sm font-bold text-white bg-indigo-600 hover:bg-indigo-700 ">Register User</button>
        </form>
    </div>
</x-layout>
