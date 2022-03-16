<x-admin-layout>
    <div class="card bg-white">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.poi.title_singular') }}
                    {{ trans('global.list') }}
                </h6>

                @can('poi_create')
                    <a class="btn btn-indigo" href="{{ route('admin.pois.create') }}">
                        {{ trans('global.add') }} {{ trans('cruds.poi.title_singular') }}
                    </a>
                @endcan
            </div>
        </div>
        <livewire:poi.index />

    </div>
</x-admin-layout>
