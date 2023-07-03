<x-app-layout>
  <x-slot name="title">
  {{ __('global.dashboard')}}
  </x-slot>
  <section class="rs havebeenthere prose-xl">
    <livewire:frontend.dashboard></livewire:frontend.dashboard>
  </section>
</x-app-layout>