<form wire:submit.prevent="submit" class="p-3">

    <div class="form-group {{ $errors->has('newsTag.name') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="name">{{ trans('cruds.newsTag.fields.name') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="name" id="name" wire:model.defer="newsTag.name">
        <div class="validation-message">
            {{ $errors->first('newsTag.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newsTag.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('newsTag.slug') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="slug">{{ trans('cruds.newsTag.fields.slug') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="slug" id="slug" wire:model.defer="newsTag.slug">
        <div class="validation-message">
            {{ $errors->first('newsTag.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newsTag.fields.slug_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-jet-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.news-tags.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>