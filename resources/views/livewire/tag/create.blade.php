<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('tag.name') ? 'invalid' : '' }}">
        <label class="form-label" for="name">{{ trans('cruds.tag.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" wire:model.defer="tag.name">
        <div class="validation-message">
            {{ $errors->first('tag.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tag.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tag.slug') ? 'invalid' : '' }}">
        <label class="form-label" for="slug">{{ trans('cruds.tag.fields.slug') }}</label>
        <input class="form-control" type="text" name="slug" id="slug" wire:model.defer="tag.slug">
        <div class="validation-message">
            {{ $errors->first('tag.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.tag.fields.slug_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.tags.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>