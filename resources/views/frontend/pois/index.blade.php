<x-app-layout :category="$category->id??null">
    <section class="report">
        <x-slot name="title">
            {{ $category->name??__('Point of interest') }}
        </x-slot>

        <x-slot name="header">
        </x-slot>
        <section class="py-3 body-font">
            <div class="px-1 py-1 mx-auto">
                <livewire:frontend.pois.index></livewire:frontend.pois.index>
                </div>
</section>

</x-app-layout>