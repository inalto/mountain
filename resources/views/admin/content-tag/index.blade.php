<<<<<<< HEAD
@extends('layouts.admin')
@section('content')
<div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
=======
<x-admin-layout>
<div class="bg-white card">
    <div class="border-b card-header border-blueGray-200">
>>>>>>> master
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
<<<<<<< HEAD
    @livewire('content-tag.index')

</div>
@endsection
=======
    <livewire:content-tag.index></livewire:content-tag.index>

</div>
</x-admin-layout>
>>>>>>> master
