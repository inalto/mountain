<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('report.title') ? 'invalid' : '' }}">
        <label class="form-label required" for="title">{{ trans('cruds.report.fields.title') }}</label>
        <input class="form-control" type="text" name="title" id="title" required wire:model.defer="report.title">
        <div class="validation-message">
            {{ $errors->first('report.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('report.slug') ? 'invalid' : '' }}">
        <label class="form-label" for="slug">{{ trans('cruds.report.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" wire:model.defer="report.slug">
        <div class="validation-message">
            {{ $errors->first('report.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('report.difficulty') ? 'invalid' : '' }}">
        <label class="form-label">{{ trans('cruds.report.fields.difficulty') }}</label>
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
        <label class="form-label" for="excerpt">{{ trans('cruds.report.fields.excerpt') }}</label>
        <textarea class="form-control" name="excerpt" id="excerpt" wire:model.defer="report.excerpt" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('report.excerpt') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.excerpt_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('report.content') ? 'invalid' : '' }}">
        <label class="form-label" for="content">{{ trans('cruds.report.fields.content') }}</label>
        <textarea class="form-control" name="content" id="content" wire:model.defer="report.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('report.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.report_photo') ? 'invalid' : '' }}">
        <label class="form-label" for="photo">{{ trans('cruds.report.fields.photo') }}</label>
        <x-dropzone id="photo" name="photo" action="{{ route('admin.reports.storeMedia') }}" collection-name="report_photo" max-file-size="2" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.report_photo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.photo_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.report_tracks') ? 'invalid' : '' }}">
        <label class="form-label" for="tracks">{{ trans('cruds.report.fields.tracks') }}</label>
        <x-dropzone id="tracks" name="tracks" action="{{ route('admin.reports.storeMedia') }}" collection-name="report_tracks" max-file-size="2" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.report_tracks') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.tracks_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tags') ? 'invalid' : '' }}">
        <label class="form-label" for="tags">{{ trans('cruds.report.fields.tags') }}</label>
        <x-select-list class="form-control" id="tags" name="tags" wire:model="tags" :options="$this->listsForFields['tags']" multiple />
        <div class="validation-message">
            {{ $errors->first('tags') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.tags_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('categories') ? 'invalid' : '' }}">
        <label class="form-label" for="categories">{{ trans('cruds.report.fields.categories') }}</label>
        <x-select-list class="form-control" id="categories" name="categories" wire:model="categories" :options="$this->listsForFields['categories']" multiple />
        <div class="validation-message">
            {{ $errors->first('categories') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.report.fields.categories_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.reports.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>