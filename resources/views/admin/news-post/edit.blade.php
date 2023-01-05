<x-admin-layout>

<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.edit') }}
                {{ trans('cruds.post.title_singular') }}:
                {{ trans('cruds.post.fields.id') }}
                {{ $post->id }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <livewire:admin.news-post.edit' :post=$post />
    </div>
</div>
</x-admin-layout>
