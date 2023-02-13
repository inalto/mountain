@props(['label'=>''])
<div x-data="{ open:false }" x-init="coordInit" class="relative">
  <input x-on:focus="open=true" type="text" {{$attributes}}>
  <input type="text" >
  <input type="text" >
  <div class="absolute z-10 w-full bg-white shadow-lg rounded-lg p-4" x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
        <div class="flex items-center justify-between">
            <p class="text-sm font-semibold text-gray-700">{{__('Arrival time:')}}</p>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor" x-on:click="open = false">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>
        <div class="mt-2">
        
            <!-- add map -->

            <div id="map" class="bg-slate-200" style="width: 100%; height: 400px"></div>    

        </div>
    </div>
</div>

@push('styles')

@endpush

@push('scripts')
<script type="text/javascript" src="/js/maps.js"></script>
<script>
  function coordInit() {
    console.log('coordInit');
  }
</script>
@endpush