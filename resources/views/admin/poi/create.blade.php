<x-admin-layout>
    <div class="card">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.create') }}
                    {{ trans('cruds.poi.title_singular') }}
                </h6>
            </div>
        </div>

        <div class="card-body">
            <livewire:poi.create />
        </div>
    </div>
</x-admin-layout>
