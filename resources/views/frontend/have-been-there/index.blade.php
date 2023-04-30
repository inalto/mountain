<x-app-layout>
    <x-slot name="title">
        {{ $category->name??__('Home') }}
    </x-slot>
    <section class="rs havebeenthere prose-xl">
<div class="card">
  <div class="card-header">
    <div class="card-header-container">
      <h6 class="card-title">
        {{ trans('global.there_were')}}
      </h6>
    </div>
  </div>

  <div class="card-body">
  <livewire:frontend.have-been-there ></livewire:frontend.have-been-there>
  </div>
    </div>

  </section>


</x-app-layout>