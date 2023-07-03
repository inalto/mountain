<x-app-layout>
  <x-slot name="title">
  {{ __('global.there_were')}}
  </x-slot>
  <section class="rs havebeenthere prose-xl">
    <div class="card">
      <div class="card-header">
        <div class="card-header-container">
          <h6 class="card-title">
            {{ __('global.there_were')}}
          </h6>
        </div>
      </div>
      <div class="card-body">
        <livewire:frontend.have-been-there :user_id="$uid"></livewire:frontend.have-been-there>
      </div>
    </div>
  </section>
</x-app-layout>