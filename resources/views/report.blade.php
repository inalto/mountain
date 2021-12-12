<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ $report->title }}
        </h2>
    </x-slot>
    <section class="report">
     <livewire:inalto.frontend.report :report="$report"></livewire:inalto.frontend.report>
    </section>
        {{--
    {{ $report->getFirstMediaUrl('report_photos') }}
--}}
</x-app-layout>
