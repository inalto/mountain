<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

            @can('report_delete')
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
                            {{ trans('cruds.report.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th>
                            {{ trans('cruds.report.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.report.fields.slug') }}
                            @include('components.table.sort', ['field' => 'slug'])
                        </th>
                        <th>
                            {{ trans('cruds.report.fields.difficulty') }}
                            @include('components.table.sort', ['field' => 'difficulty'])
                        </th>
                        <th>
                            {{ trans('cruds.report.fields.excerpt') }}
                            @include('components.table.sort', ['field' => 'excerpt'])
                        </th>
                        <th>
                            {{ trans('cruds.report.fields.content') }}
                            @include('components.table.sort', ['field' => 'content'])
                        </th>
                        <th>
                            {{ trans('cruds.report.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.report.fields.tracks') }}
                        </th>
                        <th>
                            {{ trans('cruds.report.fields.tags') }}
                        </th>
                        <th>
                            {{ trans('cruds.report.fields.categories') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $report)
                        <tr>
                            <td>
                                <input type="checkbox" value="{{ $report->id }}" wire:model="selected">
                            </td>
                            <td>
                                {{ $report->id }}
                            </td>
                            <td>
                                {{ $report->title }}
                            </td>
                            <td>
                                {{ $report->slug }}
                            </td>
                            <td>
                                {{ $report->difficulty_label }}
                            </td>
                            <td>
                                {{ $report->excerpt }}
                            </td>
                            <td>
                                {{ $report->content }}
                            </td>
                            <td>
                                @foreach($report->photo as $key => $entry)
                                    <a class="link-photo" href="{{ $entry['url'] }}">
                                        <img src="{{ $entry['thumbnail'] }}" alt="{{ $entry['name'] }}" title="{{ $entry['name'] }}">
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($report->tracks as $key => $entry)
                                    <a class="link-light-blue" href="{{ $entry['url'] }}">
                                        <i class="far fa-file">
                                        </i>
                                        {{ $entry['file_name'] }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @foreach($report->tags as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @foreach($report->categories as $key => $entry)
                                    <span class="badge badge-relationship">{{ $entry->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="flex justify-end">
                                    @can('report_show')
                                        <a class="btn btn-sm btn-info mr-2" href="{{ route('admin.reports.show', $report) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan
                                    @can('report_edit')
                                        <a class="btn btn-sm btn-success mr-2" href="{{ route('admin.reports.edit', $report) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan
                                    @can('report_delete')
                                        <button class="btn btn-sm btn-rose mr-2" type="button" wire:click="confirm('delete', {{ $report->id }})" wire:loading.attr="disabled">
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
            {{ $reports->links() }}
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