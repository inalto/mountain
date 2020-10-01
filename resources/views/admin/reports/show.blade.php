@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.report.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.id') }}
                        </th>
                        <td>
                            {{ $report->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.title') }}
                        </th>
                        <td>
                            {{ $report->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.slug') }}
                        </th>
                        <td>
                            {{ $report->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.difficulty') }}
                        </th>
                        <td>
                            {{ App\Models\Report::DIFFICULTY_SELECT[$report->difficulty] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.excerpt') }}
                        </th>
                        <td>
                            {{ $report->excerpt }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.content') }}
                        </th>
                        <td>
                            {!! $report->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.photos') }}
                        </th>
                        <td>
                            @foreach($report->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.tracks') }}
                        </th>
                        <td>
                            @foreach($report->tracks as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.categories') }}
                        </th>
                        <td>
                            @foreach($report->categories as $key => $categories)
                                <span class="label label-info">{{ $categories->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.report.fields.tags') }}
                        </th>
                        <td>
                            @foreach($report->tags as $key => $tags)
                                <span class="label label-info">{{ $tags->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reports.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection