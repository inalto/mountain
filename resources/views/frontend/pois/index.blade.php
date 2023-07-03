<x-app-layout :category="$category->id??null">
    <section class="report">
        <x-slot name="title">
            {{ $category->name??__('Point of interest') }}
        </x-slot>

        <x-slot name="header">
        </x-slot>
        <livewire:frontend.pois.index></livewire:frontend.pois.index>


</x-app-layout>