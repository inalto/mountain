@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.poi.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pois.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.poi.fields.id') }}
                        </th>
                        <td>
                            {{ $poi->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poi.fields.name') }}
                        </th>
                        <td>
                            {{ $poi->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poi.fields.lat') }}
                        </th>
                        <td>
                            {{ $poi->lat }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poi.fields.lon') }}
                        </th>
                        <td>
                            {{ $poi->lon }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poi.fields.height') }}
                        </th>
                        <td>
                            {{ $poi->height }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poi.fields.access') }}
                        </th>
                        <td>
                            {!! $poi->access !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poi.fields.description') }}
                        </th>
                        <td>
                            {!! $poi->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poi.fields.bibliography') }}
                        </th>
                        <td>
                            {{ $poi->bibliography }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.pois.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection