<x-admin-layout>
<div class="bg-white card">
    <div class="border-b card-header border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('cruds.contentCategory.title_singular') }}
                {{ trans('global.list') }}
            </h6>

            @can('content_category_create')
                <a class="btn btn-indigo" href="{{ route('admin.content-categories.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.contentCategory.title_singular') }}
                </a>
            @endcan
        </div>
    </div>
    <livewire:admin.content-category.index></livewire:admin.content-category.index>

</div>
</x-admin-layout>
