<form wire:submit.prevent="submit" class="p-3">

    <div class="form-group {{ $errors->has('crmStatus.name') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="name">{{ trans('cruds.crmStatus.fields.name') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="name" id="name" required wire:model.defer="crmStatus.name">
        <div class="validation-message">
            {{ $errors->first('crmStatus.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmStatus.fields.name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-jet-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.crm-statuses.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>