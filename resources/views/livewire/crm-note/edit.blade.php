<form wire:submit.prevent="submit" class="p-3">

    <div class="form-group {{ $errors->has('crmNote.customer_id') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="customer">{{ trans('cruds.crmNote.fields.customer') }}</x-jet-label>
        <x-select-list class="form-control" required id="customer" name="customer" :options="$this->listsForFields['customer']" wire:model="crmNote.customer_id" />
        <div class="validation-message">
            {{ $errors->first('crmNote.customer_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmNote.fields.customer_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('crmNote.note') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="note">{{ trans('cruds.crmNote.fields.note') }}</x-jet-label>
        <textarea class="form-control" name="note" id="note" required wire:model.defer="crmNote.note" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('crmNote.note') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmNote.fields.note_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-jet-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.crm-notes.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>