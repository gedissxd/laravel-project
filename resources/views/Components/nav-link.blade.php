@props(['active' => false])

<a class="{{ $active ? 'text-gray-500' : 'text-white hover:text-gray-300' }}"
    aria-current="{{ $active ? 'page': 'false' }}"
    {{ $attributes }}
>{{ $slot }}</a>
