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
                {{ trans('cruds.contentPage.title_singular') }}:
                {{ trans('cruds.contentPage.fields.id') }}
                {{ $contentPage->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
<<<<<<< HEAD
        @livewire('content-page.edit', [$contentPage])
    </div>
</div>
@endsection
=======
        <livewire:content-page.edit  :contentPage=$contentPage></livewire:content-page.edit>
    </div>
</div>
</x-admin-layout>
>>>>>>> master
