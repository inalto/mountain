<x-admin-layout>


@can('reports_tag_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="button-icon"  href="{{ route('admin.reports-tags.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.reportsTag.title_singular') }}
                <i class="fas fa-fw fa-plus bt-icon"></i>
            </a>
        </div>
    </div>
@endcan

<livewire:datatable model="App\Models\Tag" include="id, name, slug"/>


</x-admin-layout>