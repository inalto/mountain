<<<<<<< HEAD
@extends('layouts.admin')
@section('content')

=======
<x-admin-layout>
>>>>>>> master
<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                {{ trans('cruds.contentTag.title_singular') }}:
                {{ trans('cruds.contentTag.fields.id') }}
                {{ $contentTag->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
<<<<<<< HEAD
        @livewire('content-tag.edit', [$contentTag])
    </div>
</div>
@endsection
=======
        <livewire:content-tag.edit :contentTag=$contentTag></livewire:content-tag.edit>
    </div>
</div>
</x-admin-layout>
>>>>>>> master
