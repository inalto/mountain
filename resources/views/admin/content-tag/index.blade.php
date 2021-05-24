@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('cruds.contentTag.title_singular') }}
                {{ trans('global.list') }}
            </h6>

            @can('content_tag_create')
                <a class="btn btn-indigo" href="{{ route('admin.content-tags.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.contentTag.title_singular') }}
                </a>
            @endcan
        </div>
    </div>
    @livewire('content-tag.index')

</div>
@endsection