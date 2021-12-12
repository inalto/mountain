<x-admin-layout>

<div class="card">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                {{ trans('cruds.user.title_singular') }}:
                {{ trans('cruds.user.fields.id') }}
                {{ $user->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        @livewire('user.edit', [$user])
    </div>
</div>
</x-admin-layout>
