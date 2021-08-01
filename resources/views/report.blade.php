<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Report') }}
        </h2>
    </x-slot>

    {{-- <x-jet-welcome /> --}}
    <section class="body-font">

        {{ $report }}
    {{-- <livewire:inalto.frontend.report :slug="{{ $report->slug }}"></livewire:inalto.frontend.report> --}}
    </section>
        

</x-app-layout>
