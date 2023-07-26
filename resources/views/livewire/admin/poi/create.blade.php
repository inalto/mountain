<form wire:submit.prevent="submit" class="p-3">
  <div class="flex gap-10">
      <div class="w-full md:w-1/3 mb-2 form-group {{ $errors->has('poi.owner_id') ? 'invalid' : '' }}">
          <x-label class="form-label required" for="title">{{ trans('cruds.poi.fields.owner_id') }}</x-label>
          <input type="hidden" name="owner_id" id="owner_id" required wire:model="poi.owner_id" />
          <livewire:admin.user.finder :user_id="$poi->owner_id" />
          <div class="validation-message">
              {{ $errors->first('poi.owner_id') }}
          </div>
          <div class="help-block">
              {{ trans('cruds.poi.fields.owner_id_helper') }}
          </div>
      </div>
      <div class="w-full md:w-1/3 mb-2 form-group {{ $errors->has('poi.created_at') ? 'invalid' : '' }}">
          <x-label class="form-label required" for="title">{{ trans('cruds.poi.fields.created_at') }}</x-label>
          <x-datetime-picker class="w-full form-control" type="text" name="created_at" id="created_at" required
              wire:model.defer="poi.created_at" />
          <div class="validation-message">
              {{ $errors->first('poi.created_at') }}
          </div>
          <div class="help-block">
              {{ trans('cruds.poi.fields.created_at_helper') }}
          </div>
      </div>
      <div class="w-full md:w-1/3 mb-2 form-group {{ $errors->has('poi.last_survey') ? 'invalid' : '' }}">
          <x-label class="form-label required" for="title">{{ trans('cruds.poi.fields.last_survey') }}</x-label>
          <x-datetime-picker class="w-full form-control" type="text" name="last_survey" id="last_survey" required
              wire:model.defer="poi.last_survey" />
          <div class="validation-message">
              {{ $errors->first('poi.last_survey') }}
          </div>
          <div class="help-block">
              {{ trans('cruds.poi.fields.last_survey_helper') }}
          </div>
      </div>
  </div>

  <div class="flex gap-10">
      <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('poi.name') ? 'invalid' : '' }}">
          <x-label class="form-label required" for="name">{{ trans('cruds.poi.fields.name') }}</x-label>
          <x-input class="w-full form-control" type="text" name="name" id="name" required
              wire:model="poi.name" />
          <div class="validation-message">
              {{ $errors->first('poi.name') }}
          </div>
          <div class="help-block">
              {{ trans('cruds.poi.fields.name_helper') }}
          </div>
      </div>
      <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('poi.slug') ? 'invalid' : '' }}">
          <x-label class="form-label" for="slug">{{ trans('cruds.poi.fields.slug') }}</x-label>
          <x-input class="w-full form-control" type="text" name="slug" id="slug"
              wire:model.defer="poi.slug" />
          <div class="validation-message">
              {{ $errors->first('poi.slug') }}
          </div>
          <div class="help-block">
              {{ trans('cruds.poi.fields.slug_helper') }}
          </div>
      </div>
  </div>
  <div class="flex gap-10">
      <div class="w-full md:w-1/2 mb-2">
          <x-input.coords id="coords"/>
      </div>
      <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('poi.height') ? 'invalid' : '' }}">
          <x-label class="form-label" for="height">{{ trans('cruds.poi.fields.height') }}</x-label>
          <x-height class="w-full form-control" type="text" name="height" id="height" wire:model="poi.height"
              right="m" />
          <div class="validation-message">
              {{ $errors->first('poi.height') }}
          </div>
          <div class="help-block">
              {{ trans('cruds.poi.fields.height_helper') }}
          </div>
      </div>



      <div class="w-full md:w-1/4 mb-2 form-group">
          <x-label class="form-label" for="type">{{ trans('cruds.poi.fields.approved') }}</x-label>
          <x-jet-checkbox wire:model="poi.approved"></x-jet-checkbox>
          <div class="help-block">
              {{ trans('cruds.poi.fields.approved_helper') }}
          </div>

      </div>
      <div class="w-full md:w-1/4 mb-3 form-group">
          <x-label class="form-label" for="type">{{ trans('cruds.poi.fields.published') }}</x-label>
          <x-jet-checkbox wire:model="poi.published"></x-jet-checkbox>
          <div class="help-block">
              {{ trans('cruds.poi.fields.published_helper') }}
          </div>
      </div>

  </div>
  <div class="form-group {{ $errors->has('poi.excerpt') ? 'invalid' : '' }}">
      <x-label class="form-label" for="excerpt">{{ trans('cruds.poi.fields.excerpt') }}</x-label>
      <x-ckedit id="poi.excerpt" wire:model.defer="poi.excerpt" name="excerpt">
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

      <x-ckedit id="poi.content" wire:model.defer="poi.content" name="content">
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

  <x-media-library-collection name="photos" :model="$poi" collection="poi_photos"
      fields-view="livewire.partials.collection.fields" />

  <div class="form-group {{ $errors->has('tags') ? 'invalid' : '' }}">
      <x-label class="form-label" for="tags">{{ trans('cruds.poi.fields.tags') }}</x-label>
      <x-select-list class="form-control" id="tags" name="tags" wire:model="tags" :options="$poi->tags->pluck('name', 'id')->toArray()"
          multiple />
      <div class="validation-message">
          {{ $errors->first('tags') }}
      </div>
      <div class="help-block">
          {{ trans('cruds.poi.fields.tags_helper') }}
      </div>
  </div>

  <div class="form-group flex justify-between">
      <div>
          <x-jet-button class="mr-2" type="submit">
              {{ trans('global.save_and_exit') }}
          </x-jet-button>
          <x-jet-button class="mr-2" type="submit" wire:click.prevent="save">
              {{ trans('global.save') }}
          </x-jet-button>
          <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary">
              {{ trans('global.cancel') }}
          </a>
      </div>
      <x-delete-button></x-delete-button>
  </div>
</form>
