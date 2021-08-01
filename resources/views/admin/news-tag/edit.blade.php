@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                {{ trans('cruds.newsTag.title_singular') }}:
                {{ trans('cruds.newsTag.fields.id') }}
                {{ $newsTag->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        @livewire('news-tag.edit', [$newsTag])
    </div>
</div>
@endsection