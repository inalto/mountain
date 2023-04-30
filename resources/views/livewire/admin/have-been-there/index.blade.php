<div>
    <div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>
            @can('inalto_havebeenthere_delete')
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
                            {{ trans('cruds.havebeenthere.fields.id') }}
                            @include('components.table.sort', ['field' => 'id'])
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.havebeenthere.fields.report_id') }}
                            @include('components.table.sort', ['field' => 'report_id'])
                        </th>
                        <th class="w-28">
                            {{ trans('cruds.havebeenthere.fields.date') }}
                            @include('components.table.sort', ['field' => 'date'])
                        </th>
                        <th>
                            {{ trans('cruds.havebeenthere.fields.title') }}
                            @include('components.table.sort', ['field' => 'title'])
                        </th>
                        <th>
                            {{ trans('cruds.havebeenthere.fields.username') }}
                            @include('components.table.sort', ['field' => 'owner.name'])
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
                            {{ trans('cruds.havebeenthere.fields.difficulty') }}
                            @include('components.table.sort', ['field' => 'difficulty'])
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($hbts as $hbt)

                    <tr class="table-row">

                        <td>
                            <input type="checkbox" value="{{ $hbt->id }}" wire:model="selected" class="m-2">
                        </td>
                        <td>
                            {{ $hbt->id }}
                        </td>
                        <td>
                            {{ $hbt->report_id }}
                        </td>
                        <td>
                            {{ $hbt->date }}
                        </td>
                        <td>
                            <div class="relative inline-flex items-center justify-between space-x-2 w-full max-w-sm">
                                {{ $hbt->title }}
                                <div class="inline group">
                                    <span>
                                        <svg xmlns="http://www.w3.org/2000/svg" stroke-width="1.5" viewBox="0 0 24 24" fill="none" class="h-4 w-4 group-hover:text-blue-500 transition duration-150">
                                            <path d="M12 11.5V16.5" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 7.51L12.01 7.49889" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                    <div class="invisible group-hover:visible absolute top-0 left-0 z-10 space-y-1 bg-gray-900 text-gray-50 text-sm rounded px-4 py-2 w-full max-w-xs shadow-md" role="tooltip" aria-hidden="true">
                                        <p>url alias:<br>{{ $hbt->slug }}</p>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ $hbt->owner->name }}
                        </td>
                        <td>
                            @if($hbt->approved)
                            <svg class="mx-auto w-6 h-6 fill-green-600" fill="currentColor" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path d="M8.09,0.642c4.174,0 7.563,3.389 7.563,7.563c0,4.175 -3.389,7.564 -7.563,7.564c-4.174,-0 -7.564,-3.389 -7.564,-7.564c0,-4.174 3.39,-7.563 7.564,-7.563Zm-0,1.891c3.131,-0 5.672,2.542 5.672,5.672c0,3.131 -2.541,5.673 -5.672,5.673c-3.131,0 -5.673,-2.542 -5.673,-5.673c0,-3.13 2.542,-5.672 5.673,-5.672Z" /><path d="M6.756,12.808l-3.795,-3.795l1.271,-1.271l2.524,2.524l5.012,-5.012l1.271,1.271l-6.283,6.283Z" /></svg>
                            @else 
                            <svg class="mx-auto w-6 h-6 fill-red-500" fill="currentColor" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path d="M8.09,0.642c4.174,0 7.563,3.389 7.563,7.563c0,4.175 -3.389,7.564 -7.563,7.564c-4.174,-0 -7.564,-3.389 -7.564,-7.564c0,-4.174 3.39,-7.563 7.564,-7.563Zm-0,1.891c3.131,-0 5.672,2.542 5.672,5.672c0,3.131 -2.541,5.673 -5.672,5.673c-3.131,0 -5.673,-2.542 -5.673,-5.673c0,-3.13 2.542,-5.672 5.673,-5.672Z" /><path d="M8.09,6.934l2.506,-2.506l1.271,1.271l-2.506,2.506l2.506,2.507l-1.271,1.271l-2.506,-2.506l-2.506,2.506l-1.271,-1.271l2.506,-2.507l-2.506,-2.506l1.271,-1.271l2.506,2.506Z" 
                                ></svg>
                            @endif
                        </td>
                        <td>
                            @if($hbt->published)
                            <svg class="mx-auto w-6 h-6 fill-green-600" fill="currentColor" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path d="M8.09,0.642c4.174,0 7.563,3.389 7.563,7.563c0,4.175 -3.389,7.564 -7.563,7.564c-4.174,-0 -7.564,-3.389 -7.564,-7.564c0,-4.174 3.39,-7.563 7.564,-7.563Zm-0,1.891c3.131,-0 5.672,2.542 5.672,5.672c0,3.131 -2.541,5.673 -5.672,5.673c-3.131,0 -5.673,-2.542 -5.673,-5.673c0,-3.13 2.542,-5.672 5.673,-5.672Z" /><path d="M6.756,12.808l-3.795,-3.795l1.271,-1.271l2.524,2.524l5.012,-5.012l1.271,1.271l-6.283,6.283Z" /></svg>
                            @else 
                            <svg class="mx-auto w-6 h-6 fill-red-500" fill="currentColor" viewBox="0 0 16 16" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" xmlns:serif="http://www.serif.com/" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><path d="M8.09,0.642c4.174,0 7.563,3.389 7.563,7.563c0,4.175 -3.389,7.564 -7.563,7.564c-4.174,-0 -7.564,-3.389 -7.564,-7.564c0,-4.174 3.39,-7.563 7.564,-7.563Zm-0,1.891c3.131,-0 5.672,2.542 5.672,5.672c0,3.131 -2.541,5.673 -5.672,5.673c-3.131,0 -5.673,-2.542 -5.673,-5.673c0,-3.13 2.542,-5.672 5.673,-5.672Z" /><path d="M8.09,6.934l2.506,-2.506l1.271,1.271l-2.506,2.506l2.506,2.507l-1.271,1.271l-2.506,-2.506l-2.506,2.506l-1.271,-1.271l2.506,-2.507l-2.506,-2.506l1.271,-1.271l2.506,2.506Z" 
                                ></svg>
                            @endif
                        </td>
                        <td>
                            {{ $hbt->difficulty }}
                        </td>

                        <td>
                            <div class="flex justify-end">
                                @can('inalto_havebeenthere_show')
                                <a class="show mr-2" href="{{route('report.show',$hbt->report?->getUrl())}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                @endcan
                                @can('inalto_havebeenthere_edit')
                                <a class="edit mr-2" href="{{ route('admin.have-been-there.edit', $hbt->id) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>

                                </a>
                                @endcan
                                @can('inalto_havebeenthere_delete')
                                <button class="delete mr-2" type="button" wire:click="confirm('delete', {{ $hbt->id }})" wire:loading.attr="disabled">
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
                @can('havebeenthere_delete')
                <button class="delete ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="fa fa-trash"></i>
                </button>

                @endcan


            </p>
            @endif
            {{ $hbts->links() }}
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