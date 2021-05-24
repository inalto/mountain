<x-admin-layout>

@can('role_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="button-icon" href="{{ route('admin.roles.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}
                <i class="fas fa-fw fa-plus bt-icon"></i>

            </a>
        </div>
    </div>
@endcan

<livewire:datatable
model="App\Models\Role"
include="id, title"
/>



</x-admin-layout>


