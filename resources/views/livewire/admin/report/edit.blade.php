<form wire:submit.prevent="submit" class="p-3" >


    <div class="flex gap-10">
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('report.owner_id') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="title">{{ trans('cruds.report.fields.owner_id') }}</x-label>
            <x-input class="w-full form-control" type="text" name="owner_id" id="owner_id" required wire:model="report.owner_id" />
            <div class="validation-message">
                {{ $errors->first('report.owner_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.owner_id_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('report.updated_at') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="title">{{ trans('cruds.report.fields.updated_at') }}</x-label>
            <x-datetime-picker class="w-full form-control" type="text" name="updated_at" id="updated_at" required wire:model="report.updated_at" />
            <div class="validation-message">
                {{ $errors->first('report.updated_at') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.updated_at_helper') }}
            </div>
        </div>
    </div>

    <div class="flex gap-10">
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('report.title') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="title">{{ trans('cruds.report.fields.title') }}</x-label>
            <x-input class="w-full form-control" type="text" name="title" id="title" required wire:model.debounce.500ms="report.title" />
            <div class="validation-message">
                {{ $errors->first('report.title') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.title_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('report.slug') ? 'invalid' : '' }}">
            <x-label class="form-label" for="slug">{{ trans('cruds.report.fields.slug') }}</x-label>
            <x-input class="w-full form-control" type="text" name="slug" id="slug" wire:model.debounce.500ms="report.slug" />
            <div class="validation-message">
                {{ $errors->first('report.slug') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.slug_helper') }}
            </div>
        </div>
    </div>

    <div class="flex gap-10">
        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('report.altitude_s') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="altitude_s">{{ trans('cruds.report.fields.altitude_s') }}
            </x-label>
            <x-input class="w-full form-control" type="text" name="altitude_s" id="altitude_s" required wire:model.lazy="report.altitude_s" right="m" />
            <div class="validation-message">
                {{ $errors->first('report.altitude_s') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.altitude_s_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('report.altitude_e') ? 'invalid' : '' }}">
            <x-label class="form-label" for="altitude_e">{{ trans('cruds.report.fields.altitude_e') }}</x-label>
            <x-input class="w-full form-control" type="text" name="altitude_e" id="altitude_e" wire:model.lazy="report.altitude_e" right="m" />
            <div class="validation-message">
                {{ $errors->first('report.altitude_e') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.altitude_e_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('report.drop_p') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="drop_p">{{ trans('cruds.report.fields.drop_p') }}</x-label>
            <x-input class="w-full form-control" type="text" name="drop_p" id="drop_p" required wire:model.lazy="report.drop_p" right="m" />
            <div class="validation-message">
                {{ $errors->first('report.drop_p') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.drop_p_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('report.drop_n') ? 'invalid' : '' }}">
            <x-label class="form-label" for="drop_n">{{ trans('cruds.report.fields.drop_n') }}</x-label>
            <x-input class="w-full form-control" type="text" name="drop_n" id="drop_n" wire:model.lazy="report.drop_n" right="m" />
            <div class="validation-message">
                {{ $errors->first('report.drop_n') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.drop_n_helper') }}
            </div>
        </div>
    </div>

    <div class="flex gap-10">
        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('report.time_a') ? 'invalid' : '' }}">
            <x-label class="form-label" for="time_a">{{ trans('cruds.report.fields.time_a') }}</x-label>
            <x-time type="time" class="w-full form-control" name="time_a" id="time_a" wire:model.lazy="report.time_a" />
            <div class="validation-message">
                {{ $errors->first('report.time_a') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.time_a_helper') }}
            </div>
        </div>

        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('report.time_r') ? 'invalid' : '' }}">
            <x-label class="form-label" for="time_r">{{ trans('cruds.report.fields.time_r') }}</x-label>
            <x-time type="time" class="w-full form-control" name="time_r" id="time_r" wire:model.lazy="report.time_r" />
            <div class="validation-message">
                {{ $errors->first('report.time_r') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.time_r_helper') }}
            </div>
        </div>

        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('report.length') ? 'invalid' : '' }}">
            <x-label class="form-label" for="length">{{ trans('cruds.report.fields.length') }}</x-label>
            <x-input class="w-full form-control" type="text" name="length" id="length" wire:model.lazy="report.length" right="Km" />
            <div class="validation-message">
                {{ $errors->first('report.length') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.length_helper') }}
            </div>
        </div>

        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('report.exposure') ? 'invalid' : '' }}">
            <x-label class="form-label" for="exposure">{{ trans('cruds.report.fields.exposure') }}</x-label>
            <x-input class="w-full form-control" type="text" name="exposure" id="exposure" wire:model.lazy="report.exposure" data-sun />
            <div class="validation-message">
                {{ $errors->first('report.exposure') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.exposure_helper') }}
            </div>
        </div>

    </div>
    <div class="flex gap-10">
        
        <div class="w-full md:w-1/4 mb-2 form-group">
            <x-label class="form-label" for="type">{{ trans('cruds.report.fields.difficulty_class.type') }}
            </x-label>
            <select class="form-control w-full" wire:model="type" name="type">
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
            <select class="form-control  w-full" wire:model="report.difficulty" name="difficulty">
                <option value="null">{{ trans('global.pleaseSelect') }}...</option>

                @if ($type == 'hiking')
                @foreach ($this->listsForFields['hiking'] as $key => $value)
                <option value="{{ $key }}" @if ($key==$report->difficulty)selected @endif>{{ $value }}</option>
                @endforeach
                @endif
                @if ($type == 'snowshoeing')
                @foreach ($this->listsForFields['snowshoeing'] as $key => $value)
                <option value="{{ $key }}" @if ($key==$report->difficulty)selected @endif>{{ $value }}</option>
                @endforeach
                @endif

                @if ($type == 'mountaineering')
                @foreach ($this->listsForFields['mountaineering'] as $key => $value)
                <option value="{{ $key }}" @if ($key==$report->difficulty)selected @endif>{{ $value }}</option>
                @endforeach
                @endif

                @if ($type == 'skimountaineering')
                @foreach ($this->listsForFields['skimountaineering'] as $key => $value)
                <option value="{{ $key }}" @if ($key==$report->difficulty)selected @endif>{{ $value }}</option>
                @endforeach
                @endif
                
                @if ($type == 'ferrata')
                    @foreach ($this->listsForFields['ferrata'] as $key => $value)
                        <option value="{{ $key }}" @if ($key == $report->difficulty)selected @endif>{{ $value }}</option>
                    @endforeach
                @endif

            </select>

            <div class="help-block">
                {{ trans('cruds.report.fields.difficulty_helper') }}
            </div>

        </div>


        <div class="w-full md:w-1/4 mb-2 form-group gap-5 flex">
            <div class="w-full md:w-1/2 mb-2 form-group">
                <x-label class="form-label" for="type">{{ trans('cruds.report.fields.approved') }}</x-label>
                <x-jet-checkbox wire:model="report.approved"></x-jet-checkbox>
                <div class="help-block">
                    {{ trans('cruds.report.fields.approved_helper') }}
                </div>

            </div>
            <div class="w-full md:w-1/2 mb-2 form-group">
                <x-label class="form-label" for="type">{{ trans('cruds.report.fields.published') }}</x-label>
                <x-jet-checkbox wire:model="report.published"></x-jet-checkbox>
                <div class="help-block">
                    {{ trans('cruds.report.fields.published_helper') }}
                </div>

            </div>
        </div>
    </div>

    <div class="form-group {{ $errors->has('report.access') ? 'invalid' : '' }}">
        <x-label class="form-label" for="excerpt">{{ trans('cruds.report.fields.access') }}</x-label>
        <x-ckedit wire:model="report.access" name="access">
            {{ old('access', $report->access) }}

        </x-ckedit>


        <div class="validation-message">
            {{ $errors->first('report.access') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.access_helper') }}
        </div>
    </div>


    <div class="form-group {{ $errors->has('report.excerpt') ? 'invalid' : '' }}">
        <x-label class="form-label" for="excerpt">{{ trans('cruds.report.fields.excerpt') }}</x-label>
        <x-ckedit wire:model="report.excerpt" name="excerpt">
            {{ old('excerpt', $report->excerpt) }}

        </x-ckedit>


        <div class="validation-message">
            {{ $errors->first('report.excerpt') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.excerpt_helper') }}
        </div>
    </div>



    <div class="form-group {{ $errors->has('report.content') ? 'invalid' : '' }}">
        <x-label class="form-label" for="content">{{ trans('cruds.report.fields.content') }}</x-label>

        <x-ckedit wire:model="report.content" name="content">
            {{ old('content', $report->content) }}
        </x-ckedit>

        <div class="validation-message">
            {{ $errors->first('report.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.content_helper') }}
        </div>
    </div>

    <h2 class="block font-medium text-sm text-gray-700 block form-label">Bibliografia</h2>

    <x-inalto.bibliographies :bibliographies="$bibliographies" name="bibliographies"></x-inalto.bibliographies>

    <h2 class="block font-medium text-sm text-gray-700 block form-label">Foto</h2>
    <x-media-library-collection name="photos" :model="$report" collection="report_photos" fields-view="livewire.partials.collection.fields" />
   
    <h2 class="block font-medium text-sm text-gray-700 block form-label">Tracciati GPS</h2>
    <x-media-library-collection name="tracks" :model="$report" collection="report_tracks" fields-view="livewire.partials.collection.fields"  />


    <div class="form-group {{ $errors->has('tags') ? 'invalid' : '' }}">
        <x-label class="form-label" for="tags">{{ trans('cruds.report.fields.tags') }}</x-label>
        <x-select-list class="form-control" id="tags" name="tags" wire:model="tags" :options="$this->listsForFields['tags']" multiple=true tags=true data-allow-clear="false"  />
        <div class="validation-message">
            {{ $errors->first('tags') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.tags_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('categories') ? 'invalid' : '' }}">
        <x-label class="form-label" for="categories">{{ trans('cruds.report.fields.categories') }}</x-label>
        <x-select-list class="form-control" id="categories" name="categories" wire:model="categories" :options="$this->listsForFields['categories']" multiple=true data-allow-clear="false" />
        <div class="validation-message">
            {{ $errors->first('categories') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.categories_helper') }}
        </div>
    </div>
<hr>
    <div class="flex gap-10">
        <div class="w-4/5 mb-2 form-group {{ $errors->has('parent_id') ? 'invalid' : '' }}">
            <x-label class="form-label" for="parent_id">{{ trans('cruds.report.fields.parent_id') }}</x-label>
            <x-input class="w-full form-control" type="text" name="parent_id" id="parent_id" wire:model="parent_id" />
            <div class="validation-message">
                {{ $errors->first('parent_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.parent_id_helper') }}
            </div>
        </div>
        <x-jet-button class="w-1/5 h-10 mt-6 mr-2" type="submit" wire:click.prevent="convert">
            {{ trans('cruds.report.fields.convert') }}
        </x-jet-button>

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
@push('scripts')
<script type="text/javascript">
document.addEventListener('keydown', e => {
  if (e.ctrlKey && e.key === 's') {
    e.preventDefault();
    Livewire.emit('save');
  }
});
</script>
@endpush