<x-app-layout>
    <section class="report">
        <x-slot name="title">
            {{ $category->name??__('Home') }}
        </x-slot>
        <x-slot name="header">
            <livewire:frontend.search></livewire:frontend.search>
        </x-slot>
        <livewire:frontend.reports :category="$category->slug??null" :tag="$tag->slug??null"></livewire:frontend.reports>

</x-app-layout>