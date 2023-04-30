<form wire:submit.prevent="submit" class="p-3">
    <div class="flex space-x-2">
        <div class="w-1/2 form-group {{ $errors->has('newsCategory.name')?'invalid':'' }}">
            <x-label class="form-label" for="name">{{ __('cruds.newsCategory.fields.name') }}</x-label>
            <x-input class="form-control" type="text" name="name" id="name" wire:model.debouce="newsCategory.name" />
                <div class="validation-message">
                    {{ $errors->first('newsCategory.name') }}
                </div>
                <div class="help-block">
                    {{ __('cruds.newsCategory.fields.name_helper') }}
                </div>
        </div>
        <div class="w-1/2 form-group {{ $errors->has('newsCategory.slug')?'invalid':'' }}">
            <x-label class="form-label" for="slug">{{ __('cruds.newsCategory.fields.slug') }}</x-label>
            <x-input class="form-control" type="text" name="slug" id="slug" wire:model.debounce="newsCategory.slug" />
                <div class="validation-message">
                    {{ $errors->first('newsCategory.slug') }}
                </div>
                <div class="help-block">
                    {{ __('cruds.newsCategory.fields.slug_helper') }}
                </div>
        </div>
    </div>
    <div class="form-group {{ $errors->has('newsCategory.description')?'invalid':'' }}">
        <x-label class="form-label" for="description">{{ __('cruds.newsCategory.fields.description') }}</x-label>
        <textarea class="form-control border-gray-300 shadow" name="description" id="description" wire:model.defer="newsCategory.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('newsCategory.description') }}
        </div>
        <div class="help-block">
            {{ __('cruds.newsCategory.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-button class="mr-2" type="submit">
            {{ __('global.save') }}
        </x-button>
        <a href="{{ route('admin.news-categories.index') }}" class="btn btn-secondary">
            {{ __('global.cancel') }}
        </a>
    </div>
</form>