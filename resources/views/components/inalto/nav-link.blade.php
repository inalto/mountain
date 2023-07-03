@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-900 bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-gray-100 dark:hover:text-white rounded-lg outline-none transition'
            : 'inline-flex items-center px-4 py-2 text-sm font-medium leading-5 text-gray-900 bg-white hover:bg-gray-100 dark:bg-gray-900 dark:hover:bg-gray-800 dark:text-gray-100 dark:hover:text-white rounded-lg outline-none transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
