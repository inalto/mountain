<form wire:submit.prevent="submit" class="p-3">

    <div class="flex gap-10">
        <div class="w-full md:w-1/2 form-group {{ $errors->has('report.title') ? 'invalid' : '' }}">
            <x-jet-label class="form-label required" for="title">{{ trans('cruds.report.fields.title') }}</x-jet-label>
            <x-jet-input class="w-full form-control" type="text" name="title" id="title" required wire:model="report.title"/>
            <div class="validation-message">
                {{ $errors->first('report.title') }}
            </div>
            <div class="help-block">
                {{ trans('cruds.report.fields.title_helper') }}
            </div>
        </div>
        <div class="w-full md:w-1/2 form-group {{ $errors->has('report.slug') ? 'invalid' : '' }}">
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
    <div class="form-group">
        <x-jet-label class="form-label">{{ trans('cruds.report.fields.difficulty_class.type') }}</x-jet-label>
        <select class="form-control" wire:model="report.difficulty">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['difficulty_class'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('report.difficulty') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.difficulty_helper') }}
        </div>
    </div>
    
    <div class="form-group {{ $errors->has('report.difficulty') ? 'invalid' : '' }}">
        <x-jet-label class="form-label">{{ trans('cruds.report.fields.difficulty') }}</x-jet-label>
        <select class="form-control" wire:model="report.difficulty">
            <option value="null" disabled>{{ trans('global.pleaseSelect') }}...</option>
            @foreach($this->listsForFields['difficulty'] as $key => $value)
                <option value="{{ $key }}">{{ $value }}</option>
            @endforeach
        </select>
        <div class="validation-message">
            {{ $errors->first('report.difficulty') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.difficulty_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('report.excerpt') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="excerpt">{{ trans('cruds.report.fields.excerpt') }}</x-jet-label>
        {{--<textarea class="form-control" name="excerpt" id="excerpt" wire:model.defer="report.excerpt" rows="4"></textarea>--}}

        <livewire:editorjs editor-id="excerpt" :value="$report->excerpt" wire:model.defer="report.excerpt" />

        <div class="validation-message">
            {{ $errors->first('report.excerpt') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.excerpt_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('report.content') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="content">{{ trans('cruds.report.fields.content') }}</x-jet-label>
        
        <livewire:editorjs editor-id="content" :value="$report->content" wire:model.defer="report.content" />
        
        <div class="validation-message">
            {{ $errors->first('report.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.content_helper') }}
        </div>
    </div>
    
    <div class="form-group {{ $errors->has('mediaCollections.report_photo') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="photo">{{ trans('cruds.report.fields.photo') }}</x-jet-label>
        <x-dropzone id="photo" name="photo" action="{{ route('admin.reports.storeMedia') }}" collection-name="report_photo" max-file-size="2" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.report_photo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.photo_helper') }}
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
    <div class="form-group {{ $errors->has('categories') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="categories">{{ trans('cruds.report.fields.categories') }}</x-jet-label>
        <x-select-list class="form-control" id="categories" name="categories" wire:model="categories" :options="$this->listsForFields['categories']" multiple />
        <div class="validation-message">
            {{ $errors->first('categories') }}
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