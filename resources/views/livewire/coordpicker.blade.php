<div class="relative w-full flex ">
    <div class="mb-2 form-group {{ $errors->has('poi.location.lat') ? 'invalid' : '' }}">
        <x-label class="form-label" for="location.lat">{{ trans('cruds.poi.fields.lat') }}</x-label>
        <x-input class="form-control" type="text" name="location.lat" id="location.lat" wire:model.defer="poi.location.lat" step="1" />
        <div class="validation-message">
            {{ $errors->first('poi.location.lat') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.poi.fields.lat_helper') }}
        </div>
    </div>
    <div class="mb-2 form-group {{ $errors->has('poi.location.lon') ? 'invalid' : '' }}">
        <x-label class="form-label" for="location.lon">{{ trans('cruds.poi.fields.lon') }}</x-jet-label>
            <x-input class="form-control" type="text" name="location.lon" id="location.lon" wire:model.defer="poi.location.lon" step="1" />
            <div class="validation-message">
                {{ $errors->first('poi.location.lon') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.poi.fields.lon_helper') }}
            </div>
    </div>

    @if($open)
    <div class="absolute  w-full  top-6 left-0 p-4 mt-12 bg-white rounded-lg shadow z-20">
        <div wire:click.away="closeWindow()">x</div>
        <div id="map" class="h-full" style="height:500px"></div>
    </div>
    @endif
    <a class="btn btn-secondary h-10 mt-6 " href="javascript:" wire:click="openWindow()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10" />
        </svg>
    </a>
</div>