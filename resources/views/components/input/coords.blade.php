@props(['label'=>''])
<div x-data="{ open:false,lat:@entangle('poi.location.lat').defer,lon:@entangle('poi.location.lon').defer }" x-init="coordInit" class="relative flex w-full space-x-2">
        <div class="w-full mb-2 form-group {{ $errors->has('poi.location.lat') ? 'invalid' : '' }}">
            <x-label class="form-label" for="location.lat">{{ trans('cruds.poi.fields.lat') }}</x-label>
            <x-input  x-on:focus="open=true" class="form-control" type="text" name="location.lat" id="location.lat" wire:model.defer="poi.location.lat"/>
            <div class="validation-message">
                {{ $errors->first('poi.location.lat') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.poi.fields.lat_helper') }}
            </div>
        </div>
        <div class="w-full mb-2 form-group {{ $errors->has('poi.location.lon') ? 'invalid' : '' }}">
            <x-label class="form-label" for="location.lon">{{ trans('cruds.poi.fields.lon') }}</x-jet-label>
                <x-input   x-on:focus="open=true" class="form-control" type="text" name="location.lon" id="location.lon" wire:model.defer="poi.location.lon"/>
                <div class="validation-message">
                    {{ $errors->first('poi.location.lon') }}
                </div>
                <div class="help-block">
                    {{ trans('cruds.poi.fields.lon_helper') }}
                </div>
        </div>
        <a class="btn btn-secondary h-10 mt-6 " href="javascript:" x-on:click="open=true">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
</svg>

    </a>


  <div wire:ignore class="absolute z-20 top-20 w-full bg-white shadow-lg rounded-lg p-4"  x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
        <div class="flex items-center justify-between">
            <p class="text-sm font-semibold text-gray-700">{{__('Pick a location:')}}</p>
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
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
@endpush

@push('scripts')
<script type="text/javascript" src="/js/maps.js"></script>
<script>
  function coordInit() {


    let map = L.map('map').setView([this.lat,this.lon], 13);

    
    map.on('click', onMapClick);
    L.tileLayer("https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png", {
            attribution: 'Dati: © OpenStreetMap-Mitwirkende, SRTM | Base: © OpenTopoMap (CC-BY-SA) '
        }).addTo(map);

let marker = new L.marker([this.lat,this.lon]).addTo(map);

/*
L.marker([this.lat, this.lon]).addTo(map)
    .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
    .openPopup();
*/

  function onMapClick(e) {
      
      map.removeLayer(marker);
      marker = new L.marker(e.latlng).addTo(map);
      //this.lat = e.latlng.lat;
      //this.lon = e.latlng.lng;
      @this.set('poi.location.lat', e.latlng.lat)
      @this.set('poi.location.lon', e.latlng.lng)
  }
  
  }

  


</script>
@endpush