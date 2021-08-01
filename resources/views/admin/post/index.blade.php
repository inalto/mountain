@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('cruds.post.title_singular') }}
                {{ trans('global.list') }}
            </h6>

            @can('post_create')
                <a class="btn btn-indigo" href="{{ route('admin.posts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.post.title_singular') }}
                </a>
            @endcan
        </div>
    </div>
    @livewire('post.index')

</div>
@endsection