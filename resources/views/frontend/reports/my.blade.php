<x-app-layout>
    <section class="report">
        <x-slot name="title">
            {{ __('inalto.my') }}
        </x-slot>

        
        <livewire:frontend.reports :category="$category->slug??null" :user_id="auth()->user()->id"></livewire:frontend.reports>

</x-app-layout>