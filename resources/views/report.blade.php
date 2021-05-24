<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    {{-- <x-jet-welcome /> --}}
    <section class="body-font">
    <livewire:inalto.frontend.report :slug="$slug"></livewire:inalto.frontend.report>
    </section>
        

</x-app-layout>
