<form wire:submit.prevent="submit" class="p-3">

    <div class="flex gap-10">
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('havebeenthere.owner_id') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="owner_id">{{ trans('cruds.havebeenthere.fields.owner') }}</x-label>
            <input type="hidden" name="owner_id" id="owner_id" required wire:model="havebeenthere.owner_id" />
            <livewire:admin.user.finder :user_id="$havebeenthere->owner_id" />
            <div class="validation-message">
                {{ $errors->first('havebeenthere.owner') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.havebeenthere.fields.owner_helper') }}
            </div>
        </div>

        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('havebeenthere.report_id') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="report_id">{{ trans('cruds.havebeenthere.fields.report') }}</x-label>
            <livewire:admin.report.finder :report_id="$havebeenthere->report_id" />
            <input type="hidden" name="report_id" id="report_id" required wire:model="havebeenthere.report" />
            <div class="validation-message">
                {{ $errors->first('havebeenthere.report') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.havebeenthere.fields.report_helper') }}
            </div>
        </div>
        
    </div>
    
    <div class="flex gap-10">

        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('havebeenthere.date') ? 'invalid' : '' }}">
            <x-label class="form-label " for="title">{{ trans('cruds.havebeenthere.fields.date') }}</x-label>
            <x-datetime-picker class="w-full form-control" type="text" name="date" id="date" wire:model.defer="havebeenthere.date" />
            <div class="validation-message">
                {{ $errors->first('havebeenthere.date') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.havebeenthere.fields.date_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('havebeenthere.time_a') ? 'invalid' : '' }}">
            <x-label class="form-label" for="time_a">{{ trans('cruds.report.fields.time_a') }}</x-label>
            <x-time type="time" class="w-full form-control" name="time_a" id="time_a" wire:model="havebeenthere.time_a" />
            <div class="validation-message">
                {{ $errors->first('havebeenthere.time_a') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.time_a_helper') }}
            </div>
        </div>

        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('havebeenthere.time_r') ? 'invalid' : '' }}">
            <x-label class="form-label" for="time_r">{{ trans('cruds.report.fields.time_r') }}</x-label>
            <x-time type="time" class="w-full form-control" name="time_r" id="time_r" wire:model="havebeenthere.time_r" />
            <div class="validation-message">
                {{ $errors->first('havebeentheret.time_r') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.time_r_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/4 mb-2 form-group gap-5 flex">
            <div class="w-full md:w-1/2 mb-2 form-group">
                <x-label class="form-label" for="type">{{ trans('cruds.report.fields.approved') }}</x-label>
                <x-jet-checkbox wire:model="havebeenthere.approved"></x-jet-checkbox>
                <div class="help-block">
                    {{ trans('cruds.report.fields.approved_helper') }}
                </div>
            </div>
            <div class="w-full md:w-1/2 mb-2 form-group">
                <x-label class="form-label" for="type">{{ trans('cruds.report.fields.published') }}</x-label>
                <x-jet-checkbox wire:model="havebeenthere.published"></x-jet-checkbox>
                <div class="help-block">
                    {{ trans('cruds.report.fields.published_helper') }}
                </div>

            </div>
        </div>

    </div>

    <div class="flex gap-10">
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('havebeenthere.title') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="title">{{ trans('cruds.havebeenthere.fields.title') }}</x-label>
            <x-input class="w-full form-control" type="text" name="title" id="title" required wire:model="havebeenthere.title" />
            <div class="validation-message">
                {{ $errors->first('havebeenthere.title') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.havebeenthere.fields.title_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('havebeenthere.slug') ? 'invalid' : '' }}">
            <x-label class="form-label" for="slug">{{ trans('cruds.havebeenthere.fields.slug') }}</x-label>
            <x-input class="w-full form-control" type="text" name="slug" id="slug" wire:model="havebeenthere.slug" />
            <div class="validation-message">
                {{ $errors->first('havebeenthere.slug') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.havebeenthere.fields.slug_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->has('havebeenthere.content') ? 'invalid' : '' }}">
        <x-label class="form-label" for="content">{{ trans('cruds.havebeenthere.fields.content') }}</x-label>

        <x-ckedit wire:model.defer="havebeenthere.content" id="havebeenthere.content" name="havebeenthere.content">
            {{ old('content', $havebeenthere->content) }}
        </x-ckedit>

        <div class="validation-message">
            {{ $errors->first('havebeenthere.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.havebeenthere.fields.content_helper') }}
        </div>
    </div>

    <h2>Foto</h2>
    <x-media-library-collection name="photos" :model="$havebeenthere" collection="havebeenthere_photos" fields-view="livewire.partials.collection.fields"  />

    <h2>Tracciati GPS</h2>
    <x-media-library-collection name="tracks" :model="$havebeenthere" collection="havebeenthere_tracks" fields-view="livewire.partials.collection.fields"  />

    <div class="form-group  flex justify-between mt-4">
        <div>
            <x-jet-button class="mr-2" type="submit">
                {{ trans('global.save_and_exit') }}
            </x-jet-button>
            <x-jet-button class="mr-2" type="submit" wire:click.prevent="save">
                {{ trans('global.save') }}
            </x-jet-button>
            <a href="{{ route('admin.have-been-there.index') }}" class="btn btn-secondary">
                {{ trans('global.cancel') }}
            </a>
        </div>
        <x-delete-button></x-delete-button>
    </div>

</form>