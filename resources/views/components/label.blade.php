@props(['value'])

<x-jet-label {{ $attributes->merge(['class' => 'block font-bold text-xs text-gray-700']) }}>
    {{ $value ?? $slot }}
</x-jet-label>
