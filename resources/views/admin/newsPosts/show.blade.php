@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.newsPost.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.news-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.newsPost.fields.id') }}
                        </th>
                        <td>
                            {{ $newsPost->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsPost.fields.title') }}
                        </th>
                        <td>
                            {{ $newsPost->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsPost.fields.content') }}
                        </th>
                        <td>
                            {!! $newsPost->content !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsPost.fields.photos') }}
                        </th>
                        <td>
                            @foreach($newsPost->photos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $media->getUrl('thumb') }}">
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsPost.fields.tags') }}
                        </th>
                        <td>
                            @foreach($newsPost->tags as $key => $tags)
                                <span class="label label-info">{{ $tags->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.newsPost.fields.categories') }}
                        </th>
                        <td>
                            @foreach($newsPost->categories as $key => $categories)
                                <span class="label label-info">{{ $categories->title }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.news-posts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection