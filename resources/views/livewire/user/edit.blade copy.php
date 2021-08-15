<form wire:submit.prevent="submit" class="p-3">


    
    <div class="form-group {{ $errors->has('user.name') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="name">{{ trans('cruds.user.fields.name') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name"/>
        </x-jet-input>
        <div class="validation-message">
            {{ $errors->first('user.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</x-jet-label>
        <x-jet-input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email"/>
        </x-jet-input>
        <div class="validation-message">
            {{ $errors->first('user.email') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="password">{{ trans('cruds.user.fields.password') }}</x-jet-label>
        <x-jet-input class="form-control" type="password" name="password" id="password" wire:model.defer="password"/>
        <div class="validation-message">
            {{ $errors->first('user.password') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roles') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</x-jet-label>
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