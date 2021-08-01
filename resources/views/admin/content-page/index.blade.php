<x-admin-layout>


<div class="bg-white card">
    <div class="border-b card-header border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('cruds.contentPage.title_singular') }}
                {{ trans('global.list') }}
            </h6>

            @can('content_page_create')
                <a class="btn btn-indigo" href="{{ route('admin.content-pages.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.contentPage.title_singular') }}
                </a>
            @endcan
        </div>
    </div>
   
    <livewire:content-page.index></livewire:content-page.index>

</div>
</x-admin-layout>

