@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.newsTag.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.news-tags.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.newsTag.fields.id') }}
                        </th>
                        <td>
                            {{ $newsTag->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsTag.fields.name') }}
                        </th>
                        <td>
                            {{ $newsTag->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsTag.fields.slug') }}
                        </th>
                        <td>
                            {{ $newsTag->slug }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.news-tags.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection