
<form wire:submit.prevent="submit" class="p-3">


    <div class="flex gap-10">
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('report.owner_id') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="title">{{ trans('cruds.report.fields.owner_id') }}</x-label>
            <x-input class="w-full form-control" type="text" name="owner_id" id="owner_id" required
                wire:model="report.owner_id" />
            <div class="validation-message">
                {{ $errors->first('report.owner_id') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.owner_id_helper') }}
            </div>
        </div>
    </div>

    <div class="flex gap-10">
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('report.title') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="title">{{ trans('cruds.report.fields.title') }}</x-label>
            <x-input class="w-full form-control" type="text" name="title" id="title" required
                wire:model="report.title" />
            <div class="validation-message">
                {{ $errors->first('report.title') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.title_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('report.slug') ? 'invalid' : '' }}">
            <x-label class="form-label" for="slug">{{ trans('cruds.report.fields.slug') }}</x-label>
            <x-input class="w-full form-control" type="text" name="slug" id="slug" wire:model="report.slug" />
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
            <x-input class="w-full form-control" type="text" name="altitude_s" id="altitude_s" required
                wire:model="report.altitude_s" right="m" />
            <div class="validation-message">
                {{ $errors->first('report.altitude_s') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.altitude_s_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('report.altitude_e') ? 'invalid' : '' }}">
            <x-label class="form-label" for="altitude_e">{{ trans('cruds.report.fields.altitude_e') }}</x-label>
            <x-input class="w-full form-control" type="text" name="altitude_e" id="altitude_e"
                wire:model="report.altitude_e" right="m" />
            <div class="validation-message">
                {{ $errors->first('report.altitude_e') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.altitude_e_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('report.drop_p') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="drop_p">{{ trans('cruds.report.fields.drop_p') }}</x-label>
            <x-input class="w-full form-control" type="text" name="drop_p" id="drop_p" required
                wire:model="report.drop_p" right="m" />
            <div class="validation-message">
                {{ $errors->first('report.drop_p') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.drop_p_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('report.drop_n') ? 'invalid' : '' }}">
            <x-label class="form-label" for="drop_n">{{ trans('cruds.report.fields.drop_n') }}</x-label>
            <x-input class="w-full form-control" type="text" name="drop_n" id="drop_n" wire:model="report.drop_n"
                right="m" />
            <div class="validation-message">
                {{ $errors->first('report.drop_n') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.drop_n_helper') }}
            </div>
        </div>
    </div>

    <div class="flex gap-10">
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('report.time_a') ? 'invalid' : '' }}">
            <x-label class="form-label" for="time_a">{{ trans('cruds.report.fields.time_a') }}</x-label>
   {{--         <x-time type="time" class="w-full form-control"  name="time_a" id="time_a" wire:model="report.time_a"/> --}}
            <div class="validation-message">
                {{ $errors->first('report.time_a') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.time_a_helper') }}
            </div>
        </div>

        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('report.time_r') ? 'invalid' : '' }}">
            <x-label class="form-label" for="time_r">{{ trans('cruds.report.fields.time_r') }}</x-label>
     {{--       <x-time type="time" class="w-full form-control"  name="time_r" id="time_r" wire:model="report.time_r"/> --}}
            <div class="validation-message">
                {{ $errors->first('report.time_r') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.time_r_helper') }}
            </div>
        </div>
    </div>
    <div class="flex gap-10">
        <div class="w-full md:w-1/4 mb-2 form-group {{ $errors->has('report.length') ? 'invalid' : '' }}">
            <x-label class="form-label" for="length">{{ trans('cruds.report.fields.length') }}</x-label>
            <x-input class="w-full form-control" type="text" name="length" id="length" wire:model="report.length"
                right="Km" />
            <div class="validation-message">
                {{ $errors->first('report.length') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.length_helper') }}
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
            <select class="form-control  w-full py-1 mt-2" wire:model="report.difficulty" name="difficulty">
                <option value="null">{{ trans('global.pleaseSelect') }}...</option>

                @if ($type == 'hiking')
                    @foreach ($this->listsForFields['hiking'] as $key => $value)
                        <option value="{{ $key }}" @if ($key == $report->difficulty)selected @endif>{{ $value }}</option>
                    @endforeach
                @endif
                @if ($type == 'snowshoeing')
                    @foreach ($this->listsForFields['snowshoeing'] as $key => $value)
                        <option value="{{ $key }}" @if ($key == $report->difficulty)selected @endif>{{ $value }}</option>
                    @endforeach
                @endif

                @if ($type == 'mountaineering')
                    @foreach ($this->listsForFields['mountaineering'] as $key => $value)
                        <option value="{{ $key }}" @if ($key == $report->difficulty)selected @endif>{{ $value }}</option>
                    @endforeach
                @endif

                @if ($type == 'skimountaineering')
                    @foreach ($this->listsForFields['skimountaineering'] as $key => $value)
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

    <h2>Bibliografia</h2>
    
    <x-inalto.bibliographies  :bibliographies="$bibliographies" name="bibliographies"></x-inalto.bibliographies>
    
{{--
    
    <div x-data="bibliographies()">

        <template x-for="(bibliography, index) in bibliographies" :key="index">
            <div class="flex">
                <div class="w-1/3 form-group py-3">
                    <x-input wire:model.defer="bibliographies[index].title" x-model="bibliography.title" placeholder="Titolo" type="text" name="title[]" />
                </div>
                <div class="w-1/3 form-group p-3">
                    <x-input wire:model.defer="bibliographies[index].author" x-model="bibliography.author" placeholder="Autore" type="text" name="author[]" />
                </div>
                <div class="w-1/3  form-group p-3">
                    <x-input wire:model.defer="bibliographies[index].link" x-model="bibliography.link" placeholder="Link" type="text" name="link[]" />
                </div>
                <button type="button" class="btn w-10 h-10  my-3" @click="remove(index)">&times;</button>
            </div>
        </template>

        <button type="button" class="btn btn-info my-2" @click="add()">Aggiungi</button>
    </div>

    --}}
    <h2>Foto</h2>
    <x-media-library-collection name="photos" :model="$report" collection="report_photos"/>

    
    {{-- 
    <div class="form-group {{ $errors->has('mediaCollections.report_photos') ? 'invalid' : '' }}">
        <x-label class="form-label" for="photos">{{ trans('cruds.report.fields.photos') }}</x-label>
        <x-dropzone id="photos" name="photos" action="{{ route('admin.reports.storeMedia') }}"
            collection-name="report_photos" max-file-size="2" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.report_photos') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.photos_helper') }}
        </div>
    </div>

    <div class="form-group {{ $errors->has('mediaCollections.report_tracks') ? 'invalid' : '' }}">
        <x-label class="form-label" for="tracks">{{ trans('cruds.report.fields.tracks') }}</x-label>
        <x-dropzone id="tracks" name="tracks" action="{{ route('admin.reports.storeMedia') }}"
            collection-name="report_tracks" max-file-size="2" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.report_tracks') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.tracks_helper') }}
        </div>
    </div>
    --}}
    <h2>Tracciati GPS</h2>
    <x-media-library-collection name="tracks" :model="$report" collection="report_tracks"/>


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
{{--    <div class="form-group {{ $errors->has('categories') ? 'invalid' : '' }}">
        <x-label class="form-label" for="categories">{{ trans('cruds.report.fields.categories') }}</x-label>
        <x-select-list class="form-control" id="categories" name="categories" wire:model="categories"
            :options="$this->listsForFields['categories']" multiple />
        <div class="validation-message">
            {{ $errors->first('categories') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.categories_helper') }}
        </div>
    </div>
--}}


    <div class="form-group">
        <x-jet-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>
@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>


    <script>
        document.addEventListener("livewire:load", () => {
            let el = $('#categories')
            initSelect()

            Livewire.hook('message.processed', (message, component) => {
                initSelect()
            })

            Livewire.on('setCategoriesSelect', values => {
                el.val(values).trigger('change.select2')
            })

            el.on('change', function(e) {
                @this.set('report.categories', el.select2("val"))
            })

            function initSelect() {
                el.select2({
                    placeholder: '{{ __('Select your option') }}',
                    allowClear: !el.attr('required'),
                })
            }
        })




    </script>
@endpush
