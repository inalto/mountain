<x-app-layout>
    <x-slot name="title">
        {{ __('Home') }}
    </x-slot>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>
    <svg class="inline-block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
    {{-- <x-jet-welcome /> --}}
    <section class="py-3 body-font">
        <div class="px-1 py-1 mx-auto">
            <livewire:inalto.frontend.reports></livewire:inalto.frontend.reports>
        </div>
    </section>
</x-app-layout>
