@extends('layouts.admin')
@section('content')

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                {{ trans('cruds.report.title_singular') }}:
                {{ trans('cruds.report.fields.id') }}
                {{ $report->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        @livewire('report.edit', [$report])
    </div>
</div>
@endsection