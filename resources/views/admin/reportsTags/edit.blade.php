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
                <label for="name">{{ trans('cruds.reportsTag.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $reportsTag->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reportsTag.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="reports">{{ trans('cruds.reportsTag.fields.reports') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('reports') ? 'is-invalid' : '' }}" name="reports[]" id="reports" multiple>
                    @foreach($reports as $id => $reports)
                        <option value="{{ $id }}" {{ (in_array($id, old('reports', [])) || $reportsTag->reports->contains($id)) ? 'selected' : '' }}>{{ $reports }}</option>
                    @endforeach
                </select>
                @if($errors->has('reports'))
                    <span class="text-danger">{{ $errors->first('reports') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.reportsTag.fields.reports_helper') }}</span>
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