<form wire:submit.prevent="submit" class="p-3">

    <div class="form-group {{ $errors->has('permission.title') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="title">{{ trans('cruds.permission.fields.title') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="title" id="title" required wire:model.defer="permission.title">
        <div class="validation-message">
            {{ $errors->first('permission.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.permission.fields.title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-jet-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>