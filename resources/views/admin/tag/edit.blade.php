<x-admin-layout>
<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                {{ trans('cruds.tag.title_singular') }}:
                {{ trans('cruds.tag.fields.id') }}
                {{ $tag->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <livewire:admin.tag.edit :tag=$tag ></livewire:admin.tag.edit>
    </div>
</div>
</x-admin-layout>