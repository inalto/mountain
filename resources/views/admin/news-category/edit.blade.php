<x-admin-layout>

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                {{ trans('cruds.newsCategory.title_singular') }}:
                {{ trans('cruds.newsCategory.fields.id') }}
                {{ $newsCategory->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <livewire:admin.news-category.edit :newsCategory=$newsCategory />
    </div>
</div>
</x-admin-layout>
