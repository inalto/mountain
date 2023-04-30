<form wire:submit.prevent="submit" class="p-3">
 <div class="flex space-x-2">
    <div class="w-1/2 form-group {{ $errors->has('newsCategory.name') ? 'invalid' : '' }}">
        <x-label class="form-label" for="name">{{ trans('cruds.newsCategory.fields.name') }}</x-label>
        <x-input class="form-control" type="text" name="name" id="name" wire:model="newsCategory.name"/>
        <div class="validation-message">
            {{ $errors->first('newsCategory.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newsCategory.fields.name_helper') }}
        </div>
    </div>
    <div class="w-1/2 form-group {{ $errors->has('newsCategory.slug') ? 'invalid' : '' }}">
        <x-label class="form-label" for="slug">{{ trans('cruds.newsCategory.fields.slug') }}</x-label>
        <x-input class="form-control" type="text" name="slug" id="slug" wire:model="newsCategory.slug"/>
        <div class="validation-message">
            {{ $errors->first('newsCategory.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newsCategory.fields.slug_helper') }}
        </div>
    </div>
 </div>
    <div class="form-group {{ $errors->has('newsCategory.description') ? 'invalid' : '' }}">
        <x-label class="form-label" for="description">{{ trans('cruds.newsCategory.fields.description') }}</x-label>
        <textarea class="form-control border-gray-300 shadow" name="description" id="description" wire:model.defer="newsCategory.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('newsCategory.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.newsCategory.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-button>
        <a href="{{ route('admin.news-categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>