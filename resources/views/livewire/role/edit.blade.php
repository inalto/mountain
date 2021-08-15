<form wire:submit.prevent="submit" class="p-3">

    <div class="form-group {{ $errors->has('role.title') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="title">{{ trans('cruds.role.fields.title') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="title" id="title" required wire:model.defer="role.title"/>
        <div class="validation-message">
            {{ $errors->first('role.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.role.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('permissions') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="permissions">{{ trans('cruds.role.fields.permissions') }}</x-jet-label>
        <x-select-list class="form-control" required id="permissions" name="permissions" wire:model="permissions" :options="$this->listsForFields['permissions']" multiple />
        <div class="validation-message">
            {{ $errors->first('permissions') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.role.fields.permissions_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-jet-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.roles.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>