@props(['value'])

<x-jet-label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-200']) }}>
    {{ $value ?? $slot }}
</x-jet-label>
