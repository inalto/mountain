<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('poi_delete')
                <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    {{ __('Delete Selected') }}
                </button>
            @endcan



        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay class="col-12 alert alert-info">
        Loading...
    </div>

    <div class="overflow-hidden">
        <div class="overflow-x-auto">
            <table class="table table-index w-full">
                <thead>
                    <tr>
                        <th class="w-9">
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.poi.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.poi.fields.name') }}
                            @include('components.table.sort', ['field' => 'name'])
                        </th>
                        <th>
                            {{ trans('cruds.poi.fields.lat') }}
                            @include('components.table.sort', ['field' => 'lat'])
                        </th>
                        <th>
                            {{ trans('cruds.poi.fields.lon') }}
                            @include('components.table.sort', ['field' => 'lon'])
                        </th>
                        <th>
                            {{ trans('cruds.poi.fields.height') }}
                            @include('components.table.sort', ['field' => 'height'])
                        </th>
                        <th>
                            {{ trans('cruds.poi.fields.access') }}
                            @include('components.table.sort', ['field' => 'access'])
                        </th>
                        <th>
                            {{ trans('cruds.poi.fields.description') }}
                            @include('components.table.sort', ['field' => 'description'])
                        </th>
                        <th>
                            {{ trans('cruds.poi.fields.biography') }}
                            @include('components.table.sort', ['field' => 'biography'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pois as $poi)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $poi->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $poi->id }}
                            </td>
                            <td>
                                {{ $poi->name }}
                            </td>
                            <td>
                                {{ $poi->lat }}
                            </td>
                            <td>
                                {{ $poi->lon }}
                            </td>
                            <td>
                                {{ $poi->height }}
                            </td>
                            <td>
                                {{ $poi->access }}
                            </td>
                            <td>
                                {{ $poi->description }}
                            </td>
                            <td>
                                {{ $poi->biography }}
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('poi_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.pois.show', $poi) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('poi_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.pois.edit', $poi) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('poi_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $poi->id }})" wire:loading.attr="disabled">
                                            {{ trans('global.delete') }}
                                        </button>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="10">No entries found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="card-body">
        <div class="pt-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                </p>
            @endif
            {{ $pois->links() }}
        </div>
    </div>
</div>

@push('scripts')
    <script>
        Livewire.on('confirm', e => {
    if (!confirm("{{ trans('global.areYouSure') }}")) {
        return
    }
@this[e.callback](...e.argv)
})
    </script>
@endpush