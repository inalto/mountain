<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('newsCategory.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.newsCategory.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="newsCategory.name">
        <div class="validation-message">
            {{ $errors->first('newsCategory.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newsCategory.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('newsCategory.slug') ? 'invalid' : '' }}">
        <label class="form-label" for="slug">{{ trans('cruds.newsCategory.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" wire:model.defer="newsCategory.slug">
        <div class="validation-message">
            {{ $errors->first('newsCategory.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newsCategory.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('newsCategory.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.newsCategory.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="newsCategory.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('newsCategory.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newsCategory.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.news-categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>