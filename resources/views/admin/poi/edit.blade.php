@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                {{ trans('cruds.poi.title_singular') }}:
                {{ trans('cruds.poi.fields.id') }}
                {{ $poi->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        @livewire('poi.edit', [$poi])
    </div>
</div>
@endsection