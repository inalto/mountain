<x-admin-layout>
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.inaltoCategory.title_singular') }}
        </div>

        <div class="card-body">
            <livewire:category.create />
        </div>
    </div>
</x-admin-layout>
