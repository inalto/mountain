<x-app-layout>
    <section class="report">
        <x-slot name="title">
            {{ $category->name??__('Home') }}
        </x-slot>
        <x-slot name="header">
            <livewire:inalto.frontend.search></livewire:inalto.frontend.search>
        </x-slot>
        <livewire:inalto.frontend.have-been-theres  :tag="$tag->slug??null"></livewire:inalto.frontend.have-been-theres>
</x-app-layout>