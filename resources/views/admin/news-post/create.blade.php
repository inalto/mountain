<x-admin-layout>
<div class="card bg-blueGray-100">
    <div class="card-header">
        <div class="card-header-container">
            <h6 class="card-title">
                {{ trans('global.create') }}
                {{ trans('cruds.post.title_singular') }}
            </h6>
        </div>
    </div>

    <div class="card-body">
        <livewire:news-post.create></livewire:news-post.create>
    </div>
    
    
</div>

</x-admin-layout>