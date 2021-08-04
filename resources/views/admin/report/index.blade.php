<x-admin-layout>
    <div class="card bg-white">
    <div class="card-header border-b border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('cruds.report.title_singular') }}
                {{ trans('global.list') }}
            </h6>

            @can('report_create')
                <a class="btn btn-indigo" href="{{ route('admin.reports.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.report.title_singular') }}
                </a>
            @endcan
        </div>
    </div>

    <livewire:report.index></livewire:report.index>
    

    </div>

</x-admin-layout>