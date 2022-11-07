@props(['user' => false,'show'=>false,'intro'=>trans('global.by')])

@if ($user)
<div class="flex mb-1 text-xs font-medium text-gray-500 dark:text-gray-300 title-font ">
    <div class="relative">
        @if ($user->getFirstMedia('avatar'))
        <img class="inline-block object-cover w-10 h-10 rounded-lg" src="{{$user->getFirstMedia('avatar')->geturl()}}" alt="Profile image" />
        @else
        <img class="object-cover w-10 h-10 rounded-lg" src="https://www.gravatar.com/avatar/{{md5( strtolower( trim( $user->email ) ) )}}?d=identicon" alt="{{ $user->name }}" /> 
        {{-- <img class="object-cover w-10 h-10 rounded-lg" src="https://eu.ui-avatars.com/api/?name={{ $user->name }}" alt="{{ $user->name }}" /> --}}
        @endif
        @if ($user->isOnline())
        <span class="absolute bottom-0 right-0 inline-block w-3 h-3 bg-green-600 border-2 border-white dark:border-gray-800 rounded-full"></span>
        @else
        <span class="absolute bottom-0 right-0 inline-block w-3 h-3 bg-red-600 border-2 border-white dark:border-gray-800 rounded-full"></span>
        @endif
    </div>
    @if ($show)
    <div class="flex flex-col justify-center  pl-3">
        <p class="text-gray-500">{{$intro}}</p>
        @if ($user->first_name || $user->last_name)
        <p rel="author" class="font-bold text-base text-gray-500 ">{{ $user->first_name }} {{ $user->last_name }}</p>
        @else
        <p rel="author" class="font-bold text-base text-gray-500">{{ $user->name }}</p>
        @endif
    </div>
    @endif
</div>
@endif