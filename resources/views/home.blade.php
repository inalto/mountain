<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Reports') }}
        </h2>
    </x-slot>

    {{-- <x-jet-welcome /> --}}
    <section class="py-3 body-font">
        <div class="px-1 py-1 mx-auto">
            
    <livewire:inalto.frontend.reports></livewire:inalto.frontend.reports>
            
        </div>
    </section>
        
                

</x-app-layout>
