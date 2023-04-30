<div x-data class="relative">
    <x-jet-input class="w-full" wire:model.debounce="search" type="text" :placeholder="$user_full_name" />
    @if (count($users) > 0)
    <div class="overflow-hidden z-10 absolute bg-white rounded-lg shadow-lg" x-on:click.away="$wire.closeWindow()">
        <div class="flex items-center justify-between p-2">
            <div wire:loading><x-loader /></div>
            <div class="ml-auto p-2 cursor-pointer" wire:click="closeWindow">X</div>
        </div>
        @foreach($users as $user)
        <div class="flex cursor-pointer  p-2 hover:bg-yellow-100 min-w-[40rem]" wire:click="selectUser({{ $user->id }})">

            <div class="mt-2 mr-2 w-8 h-8 rounded-full overflow-hidden">
            @if ($user->getFirstMedia('avatar'))
        <img class="inline-block object-cover w-10 h-10 rounded-lg" src="{{$user->getFirstMedia('avatar')->geturl()}}" alt="Profile image" />
        @else
        <img class="object-cover w-10 h-10  rounded-lg" src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $user->email ) ) )}}?d=identicon" alt="{{ $user->name }}" /> 
        {{-- <img class="object-cover w-10 h-10 rounded-lg" src="https://eu.ui-avatars.com/api/?name={{ $user->name }}" alt="{{ $user->name }}" /> --}}
        @endif
        @if ($user->isOnline())
        <span class="absolute bottom-0 right-0 inline-block w-3 h-3 bg-green-600 border-2 border-white dark:border-gray-800 rounded-full"></span>
        @else
        <span class="absolute bottom-0 right-0 inline-block w-3 h-3 bg-red-600 border-2 border-white dark:border-gray-800 rounded-full"></span>
        @endif
              
            </div>
            <div>
                <div class="">{{ $user->first_name }} {{ $user->last_name }}</div>
                <div class="text-xs">{{ $user->name }} {{ $user->email }}</div>
            </div>
        </div>
        @endforeach

    </div>
    @endif
</div>