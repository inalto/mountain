<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ $report->title }}
        </h2>
    </x-slot>

    <section class="hero">
        <img src="{{ $report->getFirstMediaUrl('photos') }}" class="w-full"/>
        
    </section>
    {{-- <x-jet-welcome /> --}}
    <section class="body-font prose max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">

        {!! $report->content !!}
    {{-- <livewire:inalto.frontend.report :slug="{{ $report->slug }}"></livewire:inalto.frontend.report> --}}
    </section>
        
    {{ $report->getFirstMediaUrl('photos') }}

</x-app-layout>
