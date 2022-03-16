@props(['value'])

<x-jet-label {{ $attributes->merge(['class' => 'block']) }}>
    {{ $value ?? $slot }}
</x-jet-label>
