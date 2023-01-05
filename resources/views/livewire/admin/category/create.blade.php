<form wire:submit.prevent="submit" class="card p-3">

    <div class="w-1/2 form-group {{ $errors->has('category.name') ? 'invalid' : '' }}">
        <x-label class="form-label" for="name">{{ trans('cruds.category.fields.name') }}</x-label>
        <x-input class="form-control" type="text" name="name" id="name" wire:model.defer="category.name"/>
        <div class="validation-message">
            {{ $errors->first('category.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.name_helper') }}
        </div>
    </div>
    <div class="w-1/2 form-group {{ $errors->has('category.slug') ? 'invalid' : '' }}">
        <x-label class="form-label" for="slug">{{ trans('cruds.category.fields.slug') }}</x-label>
        <x-input class="form-control" type="text" name="slug" id="slug" wire:model.defer="category.slug"/>
        <div class="validation-message">
            {{ $errors->first('category.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.slug_helper') }}
        </div>
    </div>
    <div class="w-full form-group {{ $errors->has('category.description') ? 'invalid' : '' }}">
        <x-label class="form-label" for="description">{{ trans('cruds.category.fields.description') }}</x-label>
        <textarea class="w-full form-control" name="description" id="description" wire:model.defer="category.description" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('category.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.category.fields.description_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>