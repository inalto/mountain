@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input dark:border-gray-600 dark:bg-gray-800 rounded-md shadow-sm']) !!}>
