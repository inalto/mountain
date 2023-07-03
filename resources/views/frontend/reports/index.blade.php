<x-app-layout :category="$category->id??null">
    <section class="report">
        <x-slot name="title">
            {{ $category->name??__('Home') }}
        </x-slot>

        <x-slot name="header">
        </x-slot>
        <livewire:frontend.reports :category="$category->slug??null" :tag="$tag->slug??null"></livewire:frontend.reports>


</x-app-layout>