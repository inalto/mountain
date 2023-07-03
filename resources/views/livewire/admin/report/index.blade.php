<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select  w-full sm:w-1/6">
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
            <x-search wire:model.debounce.300ms="search" class="w-full sm:w-1/3 inline-block" placeholder="{{trans('global.search')}}"></x-search>
        </div>
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
                        <th class="w-28">
                            {{ trans('cruds.report.fields.last_survey') }}
                            @include('components.table.sort', ['field' => 'last_survey'])
                        </th>
                        <th>
                            {{ trans('cruds.report.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.report.fields.username') }}
                            @include('components.table.sort', ['field' => 'owner.name'])

                        </th>
                        <th>
                            {{ trans('cruds.report.fields.categories') }}
                            @include('components.table.sort', ['field' => 'category.name'])
                        </th>
                        <th class="w-18">
                            {{ trans('cruds.report.fields.approved') }}
                            @include('components.table.sort', ['field' => 'approved'])
                        </th>
                        <th class="w-18">
                            {{ trans('cruds.report.fields.published') }}
                            @include('components.table.sort', ['field' => 'published'])
                        </th>
                        <th>
                            {{ trans('cruds.report.fields.difficulty') }}
                            @include('components.table.sort', ['field' => 'difficulty'])
                        </th>

                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reports as $report)

                    <tr class="table-row">

                        <td>
                            <input type="checkbox" value="{{ $report->id }}" wire:model="selected" class="m-2">
                        </td>
                        <td>
                            {{ $report->id }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($report->last_survey)->format('d/m/Y') }}
                        </td>
                        <td>
                            <div class="relative  w-full">
                                {{ $report->title }}
                                </div>
                                <div>
                                @foreach($report->tags as $key => $entry)
                            <span class="inline-block whitespace-nowrap px-2 mb-1 mr-1 text-xs leading-5 text-blue-500 bg-blue-100 font-medium rounded-full shadow-sm no-underline">{{ $entry->name }}</span>
                            @endforeach
                            </div>
                        </td>
                        <td>
                            {{ $report->owner->name }}
                        </td>
                        <td>
                            
                            <span class="badge badge-relationship">{{ $report->category?->translate()->name }}</span>
                            
                        </td>
                        <td>
                            <a href="javascript:void(0)" wire:click.prevent="toggle('approved',{{$report->id}})"> <x-input.toggle :checked="$report->approved" /></a>
                        </td>
                        <td>
                            <a href="javascript:void(0)" wire:click.prevent="toggle('published',{{$report->id}})"> <x-input.toggle :checked="$report->published" /></a>
                        </td>
                        <td>
                            {{ $report->difficulty }}
                        </td>
                        <td>
                            <div class="flex justify-end">
                                @can('report_show')
                                <a class="show mr-2" href="{{ route('report.show', $report->path) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                @endcan
                                @can('report_edit')
                                <a class="edit mr-2" href="{{ route('admin.reports.edit', $report) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                @endcan
                                @can('report_delete')
                                <button class="delete mr-2" type="button" wire:click="$emit('swal:confirm', {{ $report->id }})" wire:loading.attr="disabled">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
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
        <div class="p-3">
            @if($this->selectedCount)
            <p class="text-sm leading-5">
                <span class="font-medium">
                    {{ $this->selectedCount }}
                </span>
                {{ __('Entries selected') }}
                @can('report_delete')
                <button class="delete ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="fa fa-trash"></i>
                </button>

                @endcan


            </p>
            @endif
            {{ $reports->links() }}
        </div>
    </div>
</div>

@push('scripts')
<script>
    Livewire.on('confirm', e => {
        if (!confirm("Are You Sure?")) {
            return
        }
        @this[e.callback](...e.argv)
    })
</script>
@endpush