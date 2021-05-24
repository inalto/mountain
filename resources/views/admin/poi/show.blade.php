@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.view') }}
                {{ trans('cruds.poi.title_singular') }}:
                {{ trans('cruds.poi.fields.id') }}
                {{ $poi->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            <table class="table table-view">
                <tbody class="bg-white">
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
                            {{ $poi->access }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poi.fields.description') }}
                        </th>
                        <td>
                            {{ $poi->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.poi.fields.biography') }}
                        </th>
                        <td>
                            {{ $poi->biography }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a href="{{ route('admin.pois.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>
</div>
@endsection