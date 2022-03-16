<div>
<div class="card-controls sm:flex">
        <div class="w-full sm:w-1/2">
            Per page:
            <select wire:model="perPage" class="form-select w-full sm:w-1/6">
                @foreach($paginationOptions as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            </select>

           

        </div>
        <div class="h-6">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
              </svg>
            <x-input type="text" wire:model.debounce.300ms="search"></x-input>
            
        </div>
    </div>
    <div  class="p-1 h-8 block w-full">
        <div wire:loading.delay><svg xmlns="http://www.w3.org/2000/svg" class="animate-spin h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
          </svg></div>
    </div>
    <table class="table table-index w-full">
        <thead>
            <tr>
                <th class="w-9">
                </th>
                <th class="w-20">
                    {{ trans('cruds.user.fields.id') }}
                    @include('components.table.sort', ['field' => 'id'])
                </th>
                <th>
                    {{ trans('cruds.user.fields.username') }}
                    @include('components.table.sort', ['field' => 'name'])
                </th>
                <th>
                    {{ trans('cruds.user.fields.fullname') }}
                    @include('components.table.sort', ['field' => 'first_name'])
                </th>
                <th>
                    {{ trans('cruds.user.fields.email') }}
                    @include('components.table.sort', ['field' => 'email'])
                </th>
                {{--
                <th>
                    {{ trans('cruds.user.fields.email_verified_at') }}
                    @include('components.table.sort', ['field' => 'email_verified_at'])
                </th>
                <th>
                    {{ trans('cruds.user.fields.roles') }}
                </th>
                --}}
                <th>
                    {{ trans('cruds.user.fields.actions') }}
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr class="table-row">
                    <td>
                        <input type="checkbox" value="{{ $user->id }}" wire:model="selected" class="m-2">
                    </td>
                    <td>
                        {{ $user->id }}
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->first_name }} {{ $user->last_name }} 
                    </td>
                    <td>
                        <a class="link-light-blue" href="mailto:{{ $user->email }}">
                            <i class="far fa-envelope fa-fw">
                            </i>
                            {{ $user->email }}
                        </a>
                    </td>
                    {{-- 
                    <td>
                        {{ $user->email_verified_at }}
                    </td>
                    
                    <td>
                        @foreach($user->roles as $key => $entry)
                            <span class="badge badge-relationship">{{ $entry->title }}</span>
                        @endforeach
                    </td>

                    --}}
                    <td>
                        <div class="flex justify-end text-xs">
                            @can('user_show')
                                <a class="show mr-2" href="{{ route('admin.users.show', $user) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                            @endcan
                            @can('user_edit')
                                <a class="edit mr-2" href="{{ route('admin.users.edit', $user) }}">
                                    <i class="fa fa-pen"></i>
                                </a>
                            @endcan
                            @can('user_delete')
                                <button class="delete mr-2" type="button" wire:click="confirm('delete', {{ $user->id }})" wire:loading.attr="disabled">
                                    <i class="fa fa-trash"></i>
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
        <div class="p-3">
            @if($this->selectedCount)
                <p class="text-sm leading-5">
                    <span class="font-medium">
                        {{ $this->selectedCount }}
                    </span>
                    {{ __('Entries selected') }}
                
                <button class="delete ml-3 disabled:opacity-50 disabled:cursor-not-allowed" type="button" wire:click="confirm('deleteSelected')" wire:loading.attr="disabled" {{ $this->selectedCount ? '' : 'disabled' }}>
                    <i class="fa fa-trash"></i>
                </button>
            </p>
            @endif
            {{ $users->links() }}
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