<form wire:submit.prevent="submit" class="p-3">

    <div class="form-group {{ $errors->has('poi.name') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="name">{{ trans('cruds.poi.fields.name') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="name" id="name" wire:model.defer="poi.name">
        <div class="validation-message">
            {{ $errors->first('poi.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.poi.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('poi.lat') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="lat">{{ trans('cruds.poi.fields.lat') }}</x-jet-label>
        <x-jet-input class="form-control" type="number" name="lat" id="lat" wire:model.defer="poi.lat" step="1">
        <div class="validation-message">
            {{ $errors->first('poi.lat') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.poi.fields.lat_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('poi.lon') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="lon">{{ trans('cruds.poi.fields.lon') }}</x-jet-label>
        <x-jet-input class="form-control" type="number" name="lon" id="lon" wire:model.defer="poi.lon" step="1">
        <div class="validation-message">
            {{ $errors->first('poi.lon') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.poi.fields.lon_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('poi.height') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="height">{{ trans('cruds.poi.fields.height') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="height" id="height" wire:model.defer="poi.height">
        <div class="validation-message">
            {{ $errors->first('poi.height') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.poi.fields.height_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('poi.access') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="access">{{ trans('cruds.poi.fields.access') }}</x-jet-label>
        <textarea class="form-control" name="access" id="access" wire:model.defer="poi.access" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('poi.access') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.poi.fields.access_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('poi.description') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="description">{{ trans('cruds.poi.fields.description') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="description" id="description" wire:model.defer="poi.description">
        <div class="validation-message">
            {{ $errors->first('poi.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.poi.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('poi.biography') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="biography">{{ trans('cruds.poi.fields.biography') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="biography" id="biography" wire:model.defer="poi.biography">
        <div class="validation-message">
            {{ $errors->first('poi.biography') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.poi.fields.biography_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-jet-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.pois.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>