<form wire:submit.prevent="submit" class="p-3">

    <div class="flex gap-10">
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('report.title') ? 'invalid' : '' }}">
            <x-jet-label class="form-label required" for="title">{{ trans('cruds.report.fields.title') }}</x-jet-label>
            <x-jet-input class="w-full form-control" type="text" name="title" id="title" required wire:model="report.title"/>
            <div class="validation-message">
                {{ $errors->first('report.title') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.title_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/2 mb-2 form-group {{ $errors->has('report.slug') ? 'invalid' : '' }}">
            <x-jet-label class="form-label" for="slug">{{ trans('cruds.report.fields.slug') }}</x-jet-label>
            <x-jet-input class="w-full form-control" type="text" name="slug" id="slug" wire:model="report.slug"/>
            <div class="validation-message">
                {{ $errors->first('report.slug') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.slug_helper') }}
            </div>
        </div>
    </div>


    <div class="flex gap-10">
        <div class="w-full md:w-1/2 mb-2 form-group">
            <x-jet-label class="form-label" for="type">{{ trans('cruds.report.fields.difficulty_class.type') }}</x-jet-label>
            <select class="form-control" wire:model="type" name="type">
                <option value="null">{{ trans('global.pleaseSelect') }}...</option>
                @foreach($this->listsForFields['type'] as $key => $value)
                    <option value="{{ $key }}" >{{ $value }}</option>
                @endforeach
                
            </select>
        <div class="help-block">
            {{ trans('cruds.report.fields.difficulty_class.helper') }}
        </div>

        </div>
    
        <div class="w-full md:w-1/2 mb-2 form-group">
            <x-jet-label class="form-label">{{ trans('cruds.report.fields.difficulty') }}</x-jet-label>
            <select class="form-control" wire:model="difficulty" name="difficulty">
                <option value="null" >{{ trans('global.pleaseSelect') }}...</option>

            @if ($type=="hiking")
                @foreach($this->listsForFields['hiking'] as $key => $value)
                    <option value="{{ $key }}" @if ($key==$report->difficulty)selected @endif>{{ $value }}</option>
                @endforeach
            @endif
            @if ($type=="snowshoeing")
                @foreach($this->listsForFields['snowshoeing'] as $key => $value)
                    <option value="{{ $key }}" @if ($key==$report->difficulty)selected @endif>{{ $value }}</option>
                @endforeach
            @endif

            @if ($type=="mountaineering")
                @foreach($this->listsForFields['mountaineering'] as $key => $value)
                    <option value="{{ $key }}" @if ($key==$report->difficulty)selected @endif>{{ $value }}</option>
                @endforeach
            @endif
            
            @if ($type=="skimountaineering")
            @foreach($this->listsForFields['skimountaineering'] as $key => $value)
                <option value="{{ $key }}" @if ($key==$report->difficulty)selected @endif>{{ $value }}</option>
            @endforeach
            @endif


            </select>
                    
        <div class="help-block">
            {{ trans('cruds.report.fields.difficulty_helper') }}
        </div>

        </div>

    </div>
    <div class="form-group {{ $errors->has('report.excerpt') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="excerpt">{{ trans('cruds.report.fields.excerpt') }}</x-jet-label>
        <div wire:ignore>
            <textarea x-data="ckeditor()"
                      x-init="init($dispatch)"
                      wire:key="ckEditor"
                      x-ref="ckEditor"
                      name="excerpt"
                      wire:model.debounce.9999999ms="report.excerpt"></textarea>
        </div>
        <div class="validation-message">
            {{ $errors->first('report.excerpt') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.excerpt_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('report.content') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="content">{{ trans('cruds.report.fields.content') }}</x-jet-label>
        <div wire:ignore>
            <textarea x-data="ckeditor()"
                      x-init="init($dispatch)"
                      wire:key="ckEditor"
                      x-ref="ckEditor"
                      name="content"
                      wire:model.debounce.9999999ms="report.content"></textarea>
        </div>
        <div class="validation-message">
            {{ $errors->first('report.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.content_helper') }}
        </div>
    </div>
    
    <div class="form-group {{ $errors->has('mediaCollections.report_photos') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="photos">{{ trans('cruds.report.fields.photos') }}</x-jet-label>
        <x-dropzone id="photos" name="photos" action="{{ route('admin.reports.storeMedia') }}" collection-name="report_photos" max-file-size="2" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.report_photos') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.photos_helper') }}
        </div>
    </div>
    
    <div class="form-group {{ $errors->has('mediaCollections.report_tracks') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="tracks">{{ trans('cruds.report.fields.tracks') }}</x-jet-label>
        <x-dropzone id="tracks" name="tracks" action="{{ route('admin.reports.storeMedia') }}" collection-name="report_tracks" max-file-size="2" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.report_tracks') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.tracks_helper') }}
        </div>
    </div>
    
    <div class="form-group {{ $errors->has('tags') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="tags">{{ trans('cruds.report.fields.tags') }}</x-jet-label>
        <x-select-list class="form-control" id="tags" name="tags" wire:model="tags" :options="$this->listsForFields['tags']" multiple />
        <div class="validation-message">
            {{ $errors->first('tags') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.tags_helper') }}
        </div>
    </div>
    <div wire:ignore class="form-group {{ $errors->has('categories') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="categories">{{ trans('cruds.report.fields.categories') }}</x-jet-label>
        {{--<x-select-list class="form-control" id="categories" name="categories" wire:model="categories" :options="$this->listsForFields['categories']" multiple />
        <div class="validation-message">
            {{ $errors->first('categories') }}
        </div> --}}
        <div wire:ignore>
            <select id="categories"
                    class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400 select2"
                    multiple>
                @foreach($report->categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="help-block">
            {{ trans('cruds.report.fields.categories_helper') }}
        </div>
    </div>

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
<script src="https://cdn.ckeditor.com/ckeditor5/26.0.0/classic/ckeditor.js"></script>

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

          el.on('change', function (e) {
            @this.set('report.categories', el.select2("val"))
          })

          function initSelect () {
            el.select2({
              placeholder: '{{__('Select your option')}}',
              allowClear: !el.attr('required'),
            })
          }
        })
    </script>

<script>
    /**
     * An alpinejs app that handles CKEditor's lifecycle
     */
    function ckeditor() {
        return {
            /**
             * The function creates the editor and returns its instance
             * @param $dispatch Alpine's magic property
             */
            create: async function($dispatch) {
                // Create the editor with the x-ref
                const editor = await ClassicEditor.create(this.$refs.ckEditor);
                // Handle data updates
                editor.model.document.on('change:data', function() {
                    $dispatch('input', editor.getData())
                });
                // return the editor
                return editor;
            },
            /**
             * Initilizes the editor and creates a listener to recreate it after a rerender
             * @param $dispatch Alpine's magic property
             */
            init: async function($dispatch) {
                // Get an editor instance
                const editor = await this.create($dispatch);
                // Set the initial data
                {{--editor.setData('{{ old('description') }}')--}}
                // Pass Alpine context to Livewire's
                const $this = this;
                // On reinit, destroy the old instance and create a new one
                Livewire.on('reinit', async function(e) {
                    editor.setData('');
                    editor.destroy()
                        .catch( error => {
                            console.log( error );
                        } );
                    await $this.create($dispatch);
                });
            }
        }
    }
</script>
@endpush
