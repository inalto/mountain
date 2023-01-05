<x-admin-layout>
<div class="card">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                {{ trans('cruds.contentCategory.title_singular') }}:
                {{ trans('cruds.contentCategory.fields.id') }}
                {{ $contentCategory->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <livewire:admin.content-category.edit :contentCategory=$contentCategory ></livewire:admin.content-category.edit>
    </div>
</div>
</x-admin-layout>
