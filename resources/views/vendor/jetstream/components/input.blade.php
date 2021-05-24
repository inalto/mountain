@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-input rounded-md shadow-sm dark:bg-gray-900 dark:border-gray-700 dark:text-gray-200']) !!}>
