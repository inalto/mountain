<form wire:submit.prevent="submit" class="p-3">


    
    <div class="form-group {{ $errors->has('user.name') ? 'invalid' : '' }}">
        <x-label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</x-label>
        <x-input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name"/>
        </x-input>
        <div class="validation-message">
            {{ $errors->first('user.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <x-label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</x-label>
        <x-input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email"/>
        </x-input>
        <div class="validation-message">
            {{ $errors->first('user.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <x-label class="form-label" for="password">{{ trans('cruds.user.fields.password') }}</x-label>
        <x-input class="form-control" type="password" name="password" id="password" wire:model.defer="password"/>
        <div class="validation-message">
            {{ $errors->first('user.password') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roles') ? 'invalid' : '' }}">
        <x-label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</x-label>
        <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <div class="validation-message">
            {{ $errors->first('roles') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.roles_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-jet-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>