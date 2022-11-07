<form wire:submit.prevent="submit" class="p-3">

    <div class="flex gap-10">
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('havebeenthere.owner_id') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="owner_id">{{ trans('cruds.havebeenthere.fields.owner_id') }}</x-label>
            <x-input class="w-full form-control" type="text" name="owner_id" id="owner_id" required wire:model="havebeenthere.owner_id" />
            <div class="validation-message">
                {{ $errors->first('havebeenthere.owner_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.havebeenthere.fields.owner_id_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('havebeenthere.report_id') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="report_id">{{ trans('cruds.havebeenthere.fields.report_id') }}</x-label>
            <x-input class="w-full form-control" type="text" name="report_id" id="report_id" required wire:model="havebeenthere.report_id" />
            <div class="validation-message">
                {{ $errors->first('havebeenthere.report_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.havebeenthere.fields.report_id_helper') }}
            </div>
        </div>
    </div>
    <div class="flex gap-10">
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('havebeenthere.date') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="title">{{ trans('cruds.havebeenthere.fields.date') }}</x-label>
            <x-input class="w-full form-control" type="text" name="date" id="owner_id" required wire:model="havebeenthere.date" />
            <div class="validation-message">
                {{ $errors->first('havebeenthere.date') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.havebeenthere.fields.date_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('havebeenthere.updated_at') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="title">{{ trans('cruds.havebeenthere.fields.updated_at') }}</x-label>
            <x-date-picker class="w-full form-control" type="text" name="updated_at" id="updated_at" required wire:model="havebeenthere.updated_at" />
            <div class="validation-message">
                {{ $errors->first('havebeenthere.updated_at') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.havebeenthere.fields.updated_at_helper') }}
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
    <div class="flex gap-10">
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

        <div class="w-full md:w-1/4 mb-2 form-group">
            <x-label class="form-label" for="type">{{ trans('cruds.report.fields.difficulty_class.type') }}
            </x-label>
            <select class="form-control w-full py-1 mt-2" wire:model="type" name="type">
                <option value="null">{{ trans('global.pleaseSelect') }}...</option>
                @foreach ($this->listsForFields['type'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
                @endforeach

            </select>
            <div class="help-block">
                {{ trans('cruds.report.fields.difficulty_class.helper') }}
            </div>

        </div>

        <div class="w-full md:w-1/4 mb-2 form-group">
            <x-label class="form-label">{{ trans('cruds.report.fields.difficulty') }}</x-label>
            <select class="form-control  w-full py-1 mt-2" wire:model="havebeenthere.difficulty" name="difficulty">
                <option value="null">{{ trans('global.pleaseSelect') }}...</option>

                @if ($type == 'hiking')
                @foreach ($this->listsForFields['hiking'] as $key => $value)
                <option value="{{ $key }}" @if ($key==$havebeenthere->difficulty)selected @endif>{{ $value }}</option>
                @endforeach
                @endif
                @if ($type == 'snowshoeing')
                @foreach ($this->listsForFields['snowshoeing'] as $key => $value)
                <option value="{{ $key }}" @if ($key==$havebeenthere->difficulty)selected @endif>{{ $value }}</option>
                @endforeach
                @endif

                @if ($type == 'mountaineering')
                @foreach ($this->listsForFields['mountaineering'] as $key => $value)
                <option value="{{ $key }}" @if ($key==$havebeenthere->difficulty)selected @endif>{{ $value }}</option>
                @endforeach
                @endif

                @if ($type == 'skimountaineering')
                @foreach ($this->listsForFields['skimountaineering'] as $key => $value)
                <option value="{{ $key }}" @if ($key==$havebeenthere->difficulty)selected @endif>{{ $value }}</option>
                @endforeach
                @endif


            </select>

            <div class="help-block">
                {{ trans('cruds.report.fields.difficulty_helper') }}
            </div>
        </div>
    </div>
    <div class="form-group {{ $errors->has('havebeenthere.content') ? 'invalid' : '' }}">
        <x-label class="form-label" for="content">{{ trans('cruds.havebeenthere.fields.content') }}</x-label>

        <x-ckedit wire:model="havebeenthere.content" name="content">
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

    <div class="form-group  flex justify-between">
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