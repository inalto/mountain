<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}
        </h2>
    </x-slot>
    <x-jet-form-section submit="store">
        <x-slot name="title">
            {{ __('Profile Information') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('Update your account\'s profile information and email address.') }}
        </x-slot>
    
        <x-slot name="form">
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
                                <img src="" alt="" class="object-cover w-20 h-20 rounded-full">
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

                
                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif
        
            <div class="col-span-6">
                <x-jet-label for="tagline" value="{{ __('cruds.user.fields.tagline') }}" />
                <x-jet-input id="tagline" type="text" class="block w-full mt-1" wire:model.defer="state.tagline" autocomplete="name" />
                <x-jet-input-error for="tagline" class="mt-2" />
            </div>

            <div class="col-span-6 md:col-span-3">
                <x-jet-label for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" type="text" class="block w-full mt-1" wire:model.defer="state.name" autocomplete="name" />
                <x-jet-input-error for="name" class="mt-2" />
            </div>
    
            <div class="col-span-6 md:col-span-3">
                <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
                <x-jet-input id="last_name" type="text" class="block w-full mt-1" wire:model.defer="state.last_name" autocomplete="name" />
                <x-jet-input-error for="last_name" class="mt-2" />
            </div>

        <!-- Email -->
        <div class="col-span-6">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="block w-full mt-1" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        <div class="col-span-6">
            <x-jet-label for="tagline" value="{{ __('cruds.user.fields.birth_date') }}" />
            <livewire:date-picker name="birth_date"></livewire:date-picker>
        </div>
        <div class="col-span-6">
            <x-jet-label for="address" value="{{ __('Address') }}" />
            <x-jet-input id="address" type="text" class="block w-full mt-1" wire:model.defer="state.address" autocomplete="name" />
            <x-jet-input-error for="address" class="mt-2" />
        </div>

        <div class="col-span-3">
            <x-jet-label for="city" value="{{ __('City') }}" />
            <x-jet-input id="city" type="text" class="block w-full mt-1" wire:model.defer="state.city" autocomplete="name" />
            <x-jet-input-error for="city" class="mt-2" />
        </div>
        <div class="col-span-3">
            <x-jet-label for="country" value="{{ __('Country') }}" />
            <x-jet-input id="country" type="text" class="block w-full mt-1" wire:model.defer="state.country" autocomplete="name" />
            <x-jet-input-error for="country" class="mt-2" />
        </div>
        </x-slot>
    </x-jet-form-section>



<x-jet-action-section>
    <x-slot name="title">
        {{ __('User') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add a new user.') }}
    </x-slot>

    <x-slot name="content">

        
    <div class="card-body">
        <form method="POST" action="{{ route("admin.users.store") }}" enctype="multipart/form-data">
            @csrf





            

          
            <div class="form-group">
                <label for="abstract">{{ trans('cruds.user.fields.abstract') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('abstract') ? 'is-invalid' : '' }}" name="abstract" id="abstract">{!! old('abstract') !!}</textarea>
                @if($errors->has('abstract'))
                    <span class="text-danger">{{ $errors->first('abstract') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.abstract_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
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
                {{--
                <select class="form-control select2 {{ $errors->has('roles') ? 'is-invalid' : '' }}" name="roles[]" id="roles" multiple required>
                    @foreach($roles as $id => $roles)
                        <option value="{{ $id }}" {{ in_array($id, old('roles', [])) ? 'selected' : '' }}>{{ $roles }}</option>
                    @endforeach
                </select>
                @if($errors->has('roles'))
                    <span class="text-danger">{{ $errors->first('roles') }}</span>
                @endif
                --}}
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>

            <x-jet-button>
                {{ trans('global.save') }}

            </x-jet-button>
        </form>
    </div>
</x-slot>
</x-jet-section>

</x-admin-layout>

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/users/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $user->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection