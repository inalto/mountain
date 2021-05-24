<x-admin-layout>

    <div class="border-b card-header border-blueGray-200">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('cruds.user.title_singular') }}
                {{ trans('global.list') }}
            </h6>

            @can('user_create')
                <a class="btn btn-indigo" href="{{ route('admin.users.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                </a>
            @endcan
        </div>
    </div>

@can('user_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="button-icon" href="{{ route('admin.users.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
                <i class="fas fa-fw fa-plus bt-icon"></i>
            </a>
        </div>
    </div>
@endcan


<livewire:inalto.admin.users.users-table/>


</x-admin-layout>