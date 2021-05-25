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
                {{ trans('global.create') }}
                {{ trans('cruds.contentTag.title_singular') }}
            </h6>
        </div>
    </div>

    <div class="card-body">
<<<<<<< HEAD
        @livewire('content-tag.create')
    </div>
</div>
@endsection
=======
        <livewire:content-tag.create></livewire:content-tag.create>
    </div>
</div>
</x-admin-layout>
>>>>>>> master
