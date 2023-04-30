<x-admin-layout>
    <div class="card">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.report.title') }}
                </h6>
                @can('report_create')
                <a class="add" href="{{ route('admin.reports.create') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </a>
                @endcan
            </div>
        </div>
        <livewire:admin.report.index />
    </div>
    <x-swal></x-swal>
</x-admin-layout>