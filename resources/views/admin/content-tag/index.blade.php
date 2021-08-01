<x-admin-layout>
<div class="bg-white card">
    <div class="border-b card-header border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('cruds.contentTag.title_singular') }}
                {{ trans('global.list') }}
            </h6>

            @can('content_tag_create')
                <a class="btn btn-indigo" href="{{ route('admin.content-tags.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.contentTag.title_singular') }}
                </a>
            @endcan
        </div>
    </div>
    <livewire:content-tag.index></livewire:content-tag.index>

</div>
</x-admin-layout>
