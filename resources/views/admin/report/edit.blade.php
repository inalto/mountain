<x-admin-layout>
    <div class="card">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.edit') }}
                    {{ trans('cruds.report.title_singular') }}:
                    {{ $report->title }}
                    ({{ $report->id }})
                    ({{ $report->nid }})
                </h6>
            </div>
        </div>

        <div class="card-body">
            <livewire:report.edit :report=$report  />
        </div>
    </div>
</x-admin-layout>
