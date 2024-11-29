@props(['active' => false])

<a class="{{ $active ? 'text-gray-500' : 'text-white' }}"
    aria-current="{{ $active ? 'page': 'false' }}"
    {{ $attributes }}
>{{ $slot }}</a>
