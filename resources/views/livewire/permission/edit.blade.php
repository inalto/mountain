<form wire:submit.prevent="submit" class="p-3">

    <div class="form-group {{ $errors->has('permission.title') ? 'invalid' : '' }}">
        <x-label class="form-label required" for="title" >{{ trans('cruds.permission.fields.title') }}</x-label>

        <x-input class="form-control" type="text" name="title" id="title" required wire:model.defer="permission.title"></x-input>
        <div class="validation-message">
            {{ $errors->first('permission.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.permission.fields.title_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-button>
        <a href="{{ route('admin.permissions.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>