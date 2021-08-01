<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            <button class="btn btn-rose ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                {{ __('Delete Selected') }}
            </button>

        </div>
        <div class="w-full sm:w-1/2 sm:text-right">
            Search:
            <input type="text" wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" />
        </div>
    </div>
    <div wire:loading.delay class="col-12 alert alert-info">
        Loading...
    </div>
    <table class="table table-index w-full">
        <thead>
            <tr>
                <th class="w-9">
                </th>
                <th class="w-28">
                    {{ trans('cruds.contentPage.fields.id') }}
                    @include('components.table.sort', ['field' => 'id'])
                </th>
                <th>
                    {{ trans('cruds.contentPage.fields.title') }}
                    @include('components.table.sort', ['field' => 'title'])
                </th>
                <th>
                    {{ trans('cruds.contentPage.fields.category') }}
                </th>
                <th>
                    {{ trans('cruds.contentPage.fields.tag') }}
                </th>
                <th>
                    {{ trans('cruds.contentPage.fields.excerpt') }}
                    @include('components.table.sort', ['field' => 'excerpt'])
                </th>
                <th>
                    {{ trans('cruds.contentPage.fields.featured_image') }}
                </th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($contentPages as $contentPage)
                <tr>
                    <td>
                        <input type="checkbox" value="{{ $contentPage->id }}" wire:model="selected">
                    </td>
                    <td>
                        {{ $contentPage->id }}
                    </td>
                    <td>
                        {{ $contentPage->title }}
                    </td>
                    <td>
                        @foreach($contentPage->category as $key => $entry)
                            <span class="badge badge-relationship">{{ $entry->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        @foreach($contentPage->tag as $key => $entry)
                            <span class="badge badge-relationship">{{ $entry->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        {{ $contentPage->excerpt }}
                    </td>
                    <td>
                        @foreach($contentPage->featured_image as $key => $entry)
                            <a class="link-photo" href="{{ $entry['url'] }}">
                                <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                            </a>
                        @endforeach
                    </td>
                    <td>
                        <div class="flex justify-end">
                            @can('content_page_show')
                                <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.content-pages.show', $contentPage) }}">
                                    {{ trans('global.view') }}
                                </a>
                            @endcan
                            @can('content_page_edit')
                                <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.content-pages.edit', $contentPage) }}">
                                    {{ trans('global.edit') }}
                                </a>
                            @endcan
                            @can('content_page_delete')
                                <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $contentPage->id }})" wire:loading.attr="disabled">
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
            {{ $contentPages->links() }}
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