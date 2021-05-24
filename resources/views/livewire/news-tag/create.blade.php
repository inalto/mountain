<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('newsTag.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.newsTag.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="newsTag.name">
        <div class="validation-message">
            {{ $errors->first('newsTag.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newsTag.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('newsTag.slug') ? 'invalid' : '' }}">
        <label class="form-label" for="slug">{{ trans('cruds.newsTag.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" wire:model.defer="newsTag.slug">
        <div class="validation-message">
            {{ $errors->first('newsTag.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newsTag.fields.slug_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.news-tags.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>