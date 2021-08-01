<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('category.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.category.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="category.name">
        <div class="validation-message">
            {{ $errors->first('category.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category.slug') ? 'invalid' : '' }}">
        <label class="form-label" for="slug">{{ trans('cruds.category.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" wire:model.defer="category.slug">
        <div class="validation-message">
            {{ $errors->first('category.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category.description') ? 'invalid' : '' }}">
        <label class="form-label" for="description">{{ trans('cruds.category.fields.description') }}</label>
        <textarea class="form-control" name="description" id="description" wire:model.defer="category.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('category.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>