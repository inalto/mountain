<x-admin-layout>

    <div class="card">
        <div class="card-header border-b border-blueGray-200">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('cruds.category.title_singular') }}
                </h6>
                @can('inalto_category_create')
                    <a class="add" href="{{ route('admin.categories.create') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <livewire:category.index />
        </div>
    </div>
</x-admin-layout>
