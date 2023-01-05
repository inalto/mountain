
<form wire:submit.prevent="submit" class="p-3">


<div class="flex gap-10">
    <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('poi.name') ? 'invalid' : '' }}">
        <x-label class="form-label required" for="name">{{ trans('cruds.poi.fields.name') }}</x-label>
        <x-input class="w-full form-control" type="text" name="name" id="name" required wire:model="poi.name" />
        <div class="validation-message">
            {{ $errors->first('poi.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.poi.fields.name_helper') }}
        </div>
    </div>
    <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('poi.slug') ? 'invalid' : '' }}">
        <x-label class="form-label" for="slug">{{ trans('cruds.poi.fields.slug') }}</x-label>
        <x-input class="w-full form-control" type="text" name="slug" id="slug" wire:model.defer="poi.slug" />
        <div class="validation-message">
            {{ $errors->first('poi.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.poi.fields.slug_helper') }}
        </div>
    </div>
</div>


<div class="flex gap-10">

    <div class="w-full md:w-1/3 mb-2 form-group {{ $errors->has('poi.location.lat') ? 'invalid' : '' }}">
        <x-label class="form-label" for="location.lat">{{ trans('cruds.poi.fields.lat') }}</x-label>
        <x-input class="form-control" type="text" name="location.lat" id="location.lat" wire:model.defer="poi.location.lat" step="1" />
            <div class="validation-message">
                {{ $errors->first('poi.location.lat') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.poi.fields.lat_helper') }}
            </div>
    </div>
    <div class="w-full md:w-1/3 mb-2 form-group {{ $errors->has('poi.location.lon') ? 'invalid' : '' }}">
        <x-label class="form-label" for="location.lon">{{ trans('cruds.poi.fields.lon') }}</x-jet-label>
        <x-input class="form-control" type="text" name="location.lon" id="location.lon" wire:model.defer="poi.location.lon" step="1" />
            <div class="validation-message">
                {{ $errors->first('poi.location.lon') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.poi.fields.lon_helper') }}
            </div>
    </div>

    <div class="w-full md:w-1/3 mb-2 form-group {{ $errors->has('poi.height') ? 'invalid' : '' }}">
        <x-label class="form-label" for="height">{{ trans('cruds.poi.fields.height') }}</x-label>
        <x-input class="w-full form-control" type="text" name="height" id="height" wire:model="poi.height" right="m" />
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
<h2 class="mb-2">{{ trans('cruds.poi.fields.photos') }}</h2>

<x-media-library-collection name="photos" :model="$poi" collection="poi_photos" />

<div class="form-group {{ $errors->has('tags') ? 'invalid' : '' }}">
    <x-label class="form-label" for="tags">{{ trans('cruds.report.fields.tags') }}</x-label>
    <x-select-list class="form-control" id="tags" name="tags" wire:model="tags"
        :options="$this->listsForFields['tags']" multiple />
    <div class="validation-message">
        {{ $errors->first('tags') }}
    </div>
    <div class="help-block">
        {{ trans('cruds.report.fields.tags_helper') }}
    </div>
</div>

    <div class="form-group mt-5">
        <x-jet-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.pois.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>