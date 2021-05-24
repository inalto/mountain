@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('cruds.newsCategory.title_singular') }}
                {{ trans('global.list') }}
            </h6>

            @can('news_category_create')
                <a class="btn btn-indigo" href="{{ route('admin.news-categories.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.newsCategory.title_singular') }}
                </a>
            @endcan
        </div>
    </div>
    @livewire('news-category.index')

</div>
@endsection