<x-app-layout>
    <div class="card">
        <div class="card-header">
            <div class="card-header-container">
                <h6 class="card-title">
                    {{ trans('global.create') }}
                    {{ trans('cruds.havebeenthere.title_singular') }}
                </h6>
            </div>
        </div>
        <div class="card-body">
            <livewire:frontend.have-been-there.create :report_id="$id"/>
        </div>
    </div>
</x-app-layout>
