@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('cruds.contentCategory.title_singular') }}
                {{ trans('global.list') }}
            </h6>

            @can('content_category_create')
                <a class="btn btn-indigo" href="{{ route('admin.content-categories.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.contentCategory.title_singular') }}
                </a>
            @endcan
        </div>
    </div>
    @livewire('content-category.index')

</div>
@endsection