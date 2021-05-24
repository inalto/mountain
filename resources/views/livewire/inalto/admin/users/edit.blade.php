<x-jet-form-section submit="updateReport">
    <x-slot name="title">
        {{ __('Edit user') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Here you can modify user accounts') }}
    </x-slot>

    <x-slot name="form">


 <!-- Profile Photo -->
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
         <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="object-cover w-20 h-20 rounded-full">
     </div>

     <!-- New Profile Photo Preview -->
     <div class="mt-2" x-show="photoPreview">
         <span class="block w-20 h-20 rounded-full"
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

    <!-- Tag Line -->
    <div class="col-span-12">
        <x-jet-label for="tagline" value="{{ __('Tag Line') }}" />
        <x-jet-input id="tagline" type="text" class="block w-full mt-1" wire:model.defer="tagline" autocomplete="tagline" value="{{ old('tagline', $tagline) }}"/>
        <x-jet-input-error for="tagline" class="mt-2" />
    </div>

    <div class="col-span-12">
        <div class="py-6">
            <div class="border-t border-gray-200 dark:border-gray-700"></div>
        </div>
    </div>

     <!-- Username -->
     <div class="col-span-12 md:col-span-6">
        <x-jet-label for="name" value="{{ __('Username') }}" />
        <x-jet-input id="name" type="text" class="block w-full mt-1" wire:model.defer="name" autocomplete="name" value="{{ old('name', $name) }}"/>
        <x-jet-input-error for="name" class="mt-2" />
    </div>
    <!-- Username -->
    <div class="col-span-12 md:col-span-6">
        <x-jet-label for="email" value="{{ __('E-Mail') }}" />
        <x-jet-input id="email" type="text" class="block w-full mt-1" wire:model.defer="email" autocomplete="email" value="{{ old('email', $email) }}"/>
        <x-jet-input-error for="email" class="mt-2" />
    </div>

    <!-- First Name -->
    <div class="col-span-12 md:col-span-6">
        <x-jet-label for="first_name" value="{{ __('First Name') }}" />
        <x-jet-input id="first_name" type="text" class="block w-full mt-1" wire:model.defer="first_name" autocomplete="first_name" value="{{ old('first_name', $first_name) }}"/>
        <x-jet-input-error for="first_name" class="mt-2" />
    </div>
    <!-- Last Name -->
    <div class="col-span-12 md:col-span-6">
        <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
        <x-jet-input id="last_name" type="text" class="block w-full mt-1" wire:model.defer="last_name" autocomplete="last_name" value="{{ old('name', $last_name) }}"/>
        <x-jet-input-error for="last_name" class="mt-2" />
    </div>
    


    <!-- City -->
    <div class="col-span-12 md:col-span-6">
        <x-jet-label for="city" value="{{ __('City') }}" />
        <x-jet-input id="city" type="text" class="block w-full mt-1" wire:model.defer="city" autocomplete="city" value="{{ old('city', $city) }}"/>
        <x-jet-input-error for="city" class="mt-2" />
    </div>
    <!-- Country -->
    <div class="col-span-12 md:col-span-6">
        <x-jet-label for="country" value="{{ __('Country') }}" />
        <x-jet-input id="country" type="text" class="block w-full mt-1" wire:model.defer="country" autocomplete="country" value="{{ old('country', $country) }}"/>
        <x-jet-input-error for="country" class="mt-2" />
    </div>


    
</x-slot>

<x-slot name="actions">
    <x-jet-action-message class="mr-3" on="saved">
        {{ __('Saved.') }}
    </x-jet-action-message>
    <x-jet-button wire:loading.attr="disabled" wire:target="photo">
        {{ __('Save') }}
    </x-jet-button>
</x-slot>
</x-jet-form-section>
{{-- 
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="last_name">{{ trans('cruds.user.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $user->last_name) }}" required>
                @if($errors->has('last_name'))
                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="tagline">{{ trans('cruds.user.fields.tagline') }}</label>
                <input class="form-control {{ $errors->has('tagline') ? 'is-invalid' : '' }}" type="text" name="tagline" id="tagline" value="{{ old('tagline', $user->tagline) }}">
                @if($errors->has('tagline'))
                    <span class="text-danger">{{ $errors->first('tagline') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.tagline_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="birth_date">{{ trans('cruds.user.fields.birth_date') }}</label>
                <input class="form-control date {{ $errors->has('birth_date') ? 'is-invalid' : '' }}" type="text" name="birth_date" id="birth_date" value="{{ old('birth_date', $user->birth_date) }}">
                @if($errors->has('birth_date'))
                    <span class="text-danger">{{ $errors->first('birth_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.birth_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="address">{{ trans('cruds.user.fields.address') }}</label>
                <textarea class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" name="address" id="address">{{ old('address', $user->address) }}</textarea>
                @if($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.address_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="city">{{ trans('cruds.user.fields.city') }}</label>
                <input class="form-control {{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" id="city" value="{{ old('city', $user->city) }}">
                @if($errors->has('city'))
                    <span class="text-danger">{{ $errors->first('city') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.city_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="country">{{ trans('cruds.user.fields.country') }}</label>
                <input class="form-control {{ $errors->has('country') ? 'is-invalid' : '' }}" type="text" name="country" id="country" value="{{ old('country', $user->country) }}">
                @if($errors->has('country'))
                    <span class="text-danger">{{ $errors->first('country') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.country_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="abstract">{{ trans('cruds.user.fields.abstract') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('abstract') ? 'is-invalid' : '' }}" name="abstract" id="abstract">{!! old('abstract', $user->abstract) !!}</textarea>
                @if($errors->has('abstract'))
                    <span class="text-danger">{{ $errors->first('abstract') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.abstract_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password">
                @if($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="select-all btn btn-info btn-xs" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>

--}}