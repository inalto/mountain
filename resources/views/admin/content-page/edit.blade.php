<x-admin-layout>

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                {{ trans('cruds.contentPage.title_singular') }}:
                {{ trans('cruds.contentPage.fields.id') }}
                {{ $contentPage->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <livewire:admin.content-page.edit  :contentPage=$contentPage></livewire:admin.content-page.edit>
    </div>
</div>
</x-admin-layout>
