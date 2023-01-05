
<form wire:submit.prevent="submit" class="p-3">
{{--
    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
    <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
        <!-- Profile Photo File Input -->
        <input type="file" class="hidden"
                    wire:model="avatar"
                    x-ref="avatar"
                    x-on:change="
                            photoName = $refs.avatar.files[0].name;
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                photoPreview = e.target.result;
                            };
                            reader.readAsDataURL($refs.avatar.files[0]);
                    " />

        <x-label for="photo" value="{{ __('Photo') }}" />

        <!-- Current Profile Photo -->
        <div class="mt-2" x-show="! photoPreview">
            <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-32 w-32 object-cover">
        </div>

        <!-- New Profile Photo Preview -->
        <div class="mt-2" x-show="photoPreview">
            <span class="block rounded-full w-32 h-32"
                  x-bind:style="'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' + photoPreview + '\');'">
            </span>
        </div>

        <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.avatar.click()">
            {{ __('Select A New Photo') }}
        </x-jet-secondary-button>

        @if ($this->user->profile_photo_path)
            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-jet-secondary-button>
        @endif

        <x-input-error for="avatar" class="mt-2" />
    </div>
@endif
--}}
<div class="mt-2">
    <span class="block rounded-full w-32 h-32" style="background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url({{$user->getFirstMediaUrl('avatar')}});"></span>

    <x-media-library-attachment  name="avatar" />
</div>


    <div class="form-group {{ $errors->has('user.name') ? 'invalid' : '' }} mb-2">
        <x-label class="form-label required" for="user.name">{{ trans('cruds.user.fields.username') }}</x-label>
        <x-input class="form-control" type="text" name="user.name" id="user.name" required wire:model.defer="user.name"></x-input>
        <x-input-error for="user.name" class="mt-2" ></x-input-error>
    </div>

    <div class="form-group {{ $errors->has('user.first_name') ? 'invalid' : '' }} mb-2">
        <x-label class="form-label required" for="user.first_name">{{ trans('cruds.user.fields.name') }}</x-label>
        <x-input class="form-control" type="text" name="user.first_name" id="user.first_name" required wire:model.defer="user.first_name"></x-input>
        <x-input-error for="user.first_name" class="mt-2" ></x-input-error>
    </div>
    <div class="form-group {{ $errors->has('user.last_name') ? 'invalid' : '' }} mb-2">
        <x-label class="form-label required" for="user.last_name">{{ trans('cruds.user.fields.last_name') }}</x-label>
        <x-input class="form-control" type="text" name="user.last_name" id="user.last_name" required wire:model.defer="user.last_name"></x-input>
        <x-input-error for="user.last_name" class="mt-2" ></x-input-error>
    </div>


    <div class="form-group {{ $errors->has('user.email') ? 'invalid' : '' }}">
        <x-label class="form-label required" for="email">{{ trans('cruds.user.fields.email') }}</x-label>
        <x-input class="form-control" type="email" name="email" id="email" required wire:model.defer="user.email"></x-input>
        <x-input-error for="user.email" class="mt-2" ></x-input-error>

        <div class="help-block">
            {{ trans('cruds.user.fields.email_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.password') ? 'invalid' : '' }}">
        <x-label class="form-label" for="user.password">{{ trans('cruds.user.fields.password') }}</x-label>
        <x-input class="form-control" type="password" name="user.password" id="user.password" wire:model.defer="user.password"></x-input>
        <x-input-error for="user.password" class="mt-2" ></x-input-error>

        <div class="help-block">
            {{ trans('cruds.user.fields.password_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('user.roles') ? 'invalid' : '' }}">
        <x-label class="form-label required" for="user.roles">{{ trans('cruds.user.fields.roles') }}</x-label>
        <x-select-list class="form-control" required id="user.roles" name="user.roles" wire:model="roles" :options="$this->listsForFields['roles']" multiple />
        <x-input-error for="user.roles" class="mt-2" ></x-input-error>
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
