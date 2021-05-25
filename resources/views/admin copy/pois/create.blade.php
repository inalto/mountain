@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.poi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.pois.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.poi.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.poi.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lat">{{ trans('cruds.poi.fields.lat') }}</label>
                <input class="form-control {{ $errors->has('lat') ? 'is-invalid' : '' }}" type="text" name="lat" id="lat" value="{{ old('lat', '') }}">
                @if($errors->has('lat'))
                    <span class="text-danger">{{ $errors->first('lat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.poi.fields.lat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="lon">{{ trans('cruds.poi.fields.lon') }}</label>
                <input class="form-control {{ $errors->has('lon') ? 'is-invalid' : '' }}" type="text" name="lon" id="lon" value="{{ old('lon', '') }}">
                @if($errors->has('lon'))
                    <span class="text-danger">{{ $errors->first('lon') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.poi.fields.lon_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="height">{{ trans('cruds.poi.fields.height') }}</label>
                <input class="form-control {{ $errors->has('height') ? 'is-invalid' : '' }}" type="text" name="height" id="height" value="{{ old('height', '') }}">
                @if($errors->has('height'))
                    <span class="text-danger">{{ $errors->first('height') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.poi.fields.height_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="access">{{ trans('cruds.poi.fields.access') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('access') ? 'is-invalid' : '' }}" name="access" id="access">{!! old('access') !!}</textarea>
                @if($errors->has('access'))
                    <span class="text-danger">{{ $errors->first('access') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.poi.fields.access_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.poi.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.poi.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="bibliography">{{ trans('cruds.poi.fields.bibliography') }}</label>
                <textarea class="form-control {{ $errors->has('bibliography') ? 'is-invalid' : '' }}" name="bibliography" id="bibliography">{{ old('bibliography') }}</textarea>
                @if($errors->has('bibliography'))
                    <span class="text-danger">{{ $errors->first('bibliography') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.poi.fields.bibliography_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

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
                xhr.open('POST', '/admin/pois/ckmedia', true);
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
                data.append('crud_id', {{ $poi->id ?? 0 }});
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