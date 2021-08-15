<form wire:submit.prevent="submit" class="p-3">

    <div class="form-group {{ $errors->has('crmDocument.customer_id') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="customer">{{ trans('cruds.crmDocument.fields.customer') }}</x-jet-label>
        <x-select-list class="form-control" required id="customer" name="customer" :options="$this->listsForFields['customer']" wire:model="crmDocument.customer_id" />
        <div class="validation-message">
            {{ $errors->first('crmDocument.customer_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmDocument.fields.customer_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.crm_document_document_file') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="document_file">{{ trans('cruds.crmDocument.fields.document_file') }}</x-jet-label>
        <x-dropzone id="document_file" name="document_file" action="{{ route('admin.crm-documents.storeMedia') }}" collection-name="crm_document_document_file" max-file-size="2" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.crm_document_document_file') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmDocument.fields.document_file_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('crmDocument.name') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="name">{{ trans('cruds.crmDocument.fields.name') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="name" id="name" required wire:model.defer="crmDocument.name"/>
        <div class="validation-message">
            {{ $errors->first('crmDocument.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.crmDocument.fields.name_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-jet-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.crm-documents.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>