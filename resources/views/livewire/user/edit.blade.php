
<form wire:submit.prevent="submit" class="p-3">

    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
    <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
        <!-- Profile Photo File Input -->
        <input type="file" class="hidden"
                    wire:model="photo"
                    x-ref="photo"
                    x-on:change="
                            photoName = $refs.photo.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.photo.files[0]);
                    " />

        <x-jet-label for="photo" value="{{ __('Photo') }}" />

        <!-- Current Profile Photo -->
        <div class="mt-2" x-show="! photoPreview">
            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
        </div>

        <!-- New Profile Photo Preview -->
        <div class="mt-2" x-show="photoPreview">
            <span class="block rounded-full w-20 h-20"
                  x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
            </span>
        </div>

        <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
            {{ __('Select A New Photo') }}
        </x-jet-secondary-button>

        @if ($this->user->profile_photo_path)
            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-jet-secondary-button>
        @endif

        <x-jet-input-error for="photo" class="mt-2" />
    </div>
@endif

    <div class="form-group {{ $errors->has('user.name') ? 'invalid' : '' }} mb-2">
        <x-jet-label class="form-label required" for="name">{{ trans('cruds.user.fields.username') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="name" id="name" required wire:model.defer="user.name"></x-jet-input>
        <x-jet-input-error for="name" class="mt-2" ></x-jet-input-error>
    </div>

    <div class="form-group {{ $errors->has('user.first_name') ? 'invalid' : '' }} mb-2">
        <x-jet-label class="form-label required" for="first_name">{{ trans('cruds.user.fields.name') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="first_name" id="first_name" required wire:model.defer="user.first_name"></x-jet-input>
        <x-jet-input-error for="first_name" class="mt-2" ></x-jet-input-error>
    </div>
    <div class="form-group {{ $errors->has('user.last_name') ? 'invalid' : '' }} mb-2">
        <x-jet-label class="form-label required" for="last_name">{{ trans('cruds.user.fields.last_name') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="last_name" id="last_name" required wire:model.defer="user.last_name"></x-jet-input>
        <x-jet-input-error for="last_name" class="mt-2" ></x-jet-input-error>
    </div>


    <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</x-jet-label>
        <x-jet-input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email"></x-jet-input>
        <x-jet-input-error for="email" class="mt-2" ></x-jet-input-error>

        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="password">{{ trans('cruds.user.fields.password') }}</x-jet-label>
        <x-jet-input class="form-control" type="password" name="password" id="password" wire:model.defer="password"></x-jet-input>
        <x-jet-input-error for="password" class="mt-2" ></x-jet-input-error>

        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('roles') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="roles">{{ trans('cruds.user.fields.roles') }}</x-jet-label>
        <x-select-list class="form-control" required id="roles" name="roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <x-jet-input-error for="roles" class="mt-2" ></x-jet-input-error>
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
