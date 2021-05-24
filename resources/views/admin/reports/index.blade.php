<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Users') }}
        </h2>
    </x-slot>
@can('report_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="button-icon" href="{{ route('admin.reports.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.report.title_singular') }}
                <i class="fas fa-fw fa-plus bt-icon"></i>
            </a>
        </div>
    </div>
@endcan


<livewire:inalto.admin.reports.reports-table />


</x-admin-layout>





