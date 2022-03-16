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
                    {{ trans('cruds.crmCustomer.fields.id') }}
                    @include('components.table.sort', ['field' => 'id'])
                </th>
                <th>
                    {{ trans('cruds.crmCustomer.fields.first_name') }}
                    @include('components.table.sort', ['field' => 'first_name'])
                </th>
                <th>
                    {{ trans('cruds.crmCustomer.fields.last_name') }}
                    @include('components.table.sort', ['field' => 'last_name'])
                </th>
                <th>
                    {{ trans('cruds.crmCustomer.fields.status') }}
                    @include('components.table.sort', ['field' => 'status.name'])
                </th>
                <th>
                    {{ trans('cruds.crmCustomer.fields.email') }}
                    @include('components.table.sort', ['field' => 'email'])
                </th>
                <th>
                    {{ trans('cruds.crmCustomer.fields.phone') }}
                    @include('components.table.sort', ['field' => 'phone'])
                </th>
                <th>
                    {{ trans('cruds.crmCustomer.fields.address') }}
                    @include('components.table.sort', ['field' => 'address'])
                </th>
                <th>
                    {{ trans('cruds.crmCustomer.fields.skype') }}
                    @include('components.table.sort', ['field' => 'skype'])
                </th>
                <th>
                    {{ trans('cruds.crmCustomer.fields.website') }}
                    @include('components.table.sort', ['field' => 'website'])
                </th>
                <th>
                    {{ trans('cruds.crmCustomer.fields.description') }}
                    @include('components.table.sort', ['field' => 'description'])
                </th>
                <th>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($crmCustomers as $crmCustomer)
                <tr class="table-row">
                    <td>
                        <input type="checkbox" value="{{ $crmCustomer->id }}" wire:model="selected">
                    </td>
                    <td>
                        {{ $crmCustomer->id }}
                    </td>
                    <td>
                        {{ $crmCustomer->first_name }}
                    </td>
                    <td>
                        {{ $crmCustomer->last_name }}
                    </td>
                    <td>
                        @if($crmCustomer->Status)
                            <span class="badge badge-relationship">{{ $crmCustomer->Status->name ?? '' }}</span>
                        @endif
                    </td>
                    <td>
                        <a class="link-light-blue" href="mailto:{{ $crmCustomer->email }}">
                            <i class="far fa-envelope fa-fw">
                            </i>
                            {{ $crmCustomer->email }}
                        </a>
                    </td>
                    <td>
                        {{ $crmCustomer->phone }}
                    </td>
                    <td>
                        {{ $crmCustomer->address }}
                    </td>
                    <td>
                        {{ $crmCustomer->skype }}
                    </td>
                    <td>
                        {{ $crmCustomer->website }}
                    </td>
                    <td>
                        {{ $crmCustomer->description }}
                    </td>
                    <td>
                        <div class="flex justify-end">
                            @can('crm_customer_show')
                                <a class="show mr-2" href="{{ route('admin.crm-customers.show', $crmCustomer) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
</svg>
                                </a>
                            @endcan
                            @can('crm_customer_edit')
                                <a class="edit mr-2" href="{{ route('admin.crm-customers.edit', $crmCustomer) }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
</svg>
                                </a>
                            @endcan
                            @can('crm_customer_delete')
                                <button class="delete mr-2" type="button" wire:click="confirm('delete', {{ $crmCustomer->id }})" wire:loading.attr="disabled">
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
            {{ $crmCustomers->links() }}
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