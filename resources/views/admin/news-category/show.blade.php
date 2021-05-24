@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.view') }}
                {{ trans('cruds.newsCategory.title_singular') }}:
                {{ trans('cruds.newsCategory.fields.id') }}
                {{ $newsCategory->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            <table class="table table-view">
                <tbody class="bg-white">
                    <tr>
                        <th>
                            {{ trans('cruds.newsCategory.fields.id') }}
                        </th>
                        <td>
                            {{ $newsCategory->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsCategory.fields.name') }}
                        </th>
                        <td>
                            {{ $newsCategory->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsCategory.fields.slug') }}
                        </th>
                        <td>
                            {{ $newsCategory->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsCategory.fields.description') }}
                        </th>
                        <td>
                            {{ $newsCategory->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <a href="{{ route('admin.news-categories.index') }}" class="btn btn-secondary">
                {{ trans('global.back') }}
            </a>
        </div>
    </div>
</div>
@endsection