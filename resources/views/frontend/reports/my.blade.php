<x-app-layout>
    <section class="report">
        <x-slot name="title">
            {{ __('inalto.my') }}
        </x-slot>
        <x-slot name="header">
            <livewire:inalto.frontend.search></livewire:inalto.frontend.search>
        </x-slot>
        
        <livewire:inalto.frontend.reports :category="$category->slug??null" :user="auth()->user()->id"></livewire:inalto.frontend.reports>

</x-app-layout>