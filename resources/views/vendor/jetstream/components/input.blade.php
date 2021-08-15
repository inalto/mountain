@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input border-b-2 border-gray-300 text-gray-900 focus:outline-none focus:border-blue-800 dark:border-gray-600 dark:bg-gray-800 dark:text-white']) !!}>
