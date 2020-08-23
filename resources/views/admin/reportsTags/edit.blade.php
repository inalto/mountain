@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reportsTag.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reports-tags.update", [$reportsTag->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">

                <label class="required" for="name">{{ trans('cruds.reportsTag.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $reportsTag->name) }}" required>

                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reportsTag.fields.name_helper') }}</span>
            </div>
            <div class="form-group">

                <label for="slug">{{ trans('cruds.reportsTag.fields.slug') }}</label>
                <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug" value="{{ old('slug', $reportsTag->slug) }}">
                @if($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reportsTag.fields.slug_helper') }}</span>

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