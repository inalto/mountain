<form wire:submit.prevent="submit" class="p-3">


    <div class="flex gap-10">
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('poi.name') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="name">{{ trans('cruds.poi.fields.name') }}</x-label>
            <x-input class="w-full form-control" type="text" name="name" id="name" required wire:model="poi.name"/>
            <div class="validation-message">
                {{ $errors->first('poi.name') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.poi.fields.name_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('poi.slug') ? 'invalid' : '' }}">
            <x-label class="form-label" for="slug">{{ trans('cruds.poi.fields.slug') }}</x-label>
            <x-input class="w-full form-control" type="text" name="slug" id="slug" wire:model.defer="poi.slug"/>
            <div class="validation-message">
                {{ $errors->first('poi.slug') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.poi.fields.slug_helper') }}
            </div>
        </div>
    </div>


    <div class="flex gap-10">
        <div class="w-full md:w-1/3 mb-2 form-group {{ $errors->has('poi.height') ? 'invalid' : '' }}">
            <x-label class="form-label" for="height">{{ trans('cruds.poi.fields.height') }}</x-label>
            <x-input class="w-full form-control" type="text" name="height" id="height" wire:model="poi.height" right="m"/>
            <div class="validation-message">
                {{ $errors->first('poi.height') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.poi.fields.height_helper') }}
            </div>
        </div>

    

        <div class="w-full md:w-1/3 mb-2 form-group">
            <x-label class="form-label" for="type">{{ trans('cruds.poi.fields.approved') }}</x-label>
            <x-jet-checkbox wire:model="poi.approved"></x-jet-checkbox>
            <div class="help-block">
                {{ trans('cruds.poi.fields.approved_helper') }}
            </div>

        </div>
        <div class="w-full md:w-1/8 mb-3 form-group">
            <x-label class="form-label" for="type">{{ trans('cruds.poi.fields.published') }}</x-label>
            <x-jet-checkbox wire:model="poi.published"></x-jet-checkbox>
            <div class="help-block">
                {{ trans('cruds.poi.fields.published_helper') }}
            </div>
        </div>

    </div>
    















       
    <div class="form-group {{ $errors->has('poi.excerpt') ? 'invalid' : '' }}">
        <x-label class="form-label" for="excerpt">{{ trans('cruds.poi.fields.excerpt') }}</x-label>
        <x-ckedit wire:model="poi.excerpt" name="excerpt">
            {{ old('excerpt', $poi->excerpt) }}

        </x-ckedit>


        <div class="validation-message">
            {{ $errors->first('poi.excerpt') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.poi.fields.excerpt_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('poi.content') ? 'invalid' : '' }}">
        <x-label class="form-label" for="content">{{ trans('cruds.poi.fields.content') }}</x-label>
        
            <x-ckedit wire:model="poi.content" name="content">
                {{ old('content', $poi->content) }}
            </x-ckedit>
        
        <div class="validation-message">
            {{ $errors->first('poi.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.poi.fields.content_helper') }}
        </div>
    </div>
 
    {{--

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
--}}
    <div class="form-group">
        <x-jet-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.pois.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>