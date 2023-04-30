<x-admin-layout>
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.category.title_singular') }}
        </div>

        <div class="card-body">
            <livewire:admin.category.edit :category=$category />
        </div>
    </div>
</x-admin-layout>