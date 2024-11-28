@props(['active' => false])

<a class="{{ $active ? 'text-gray-500' : 'text-white' }} mr-6 font-bold hover:text-gray-300"
    aria-current="{{ $active ? 'page': 'false' }}"
    {{ $attributes }}
>{{ $slot }}</a>
