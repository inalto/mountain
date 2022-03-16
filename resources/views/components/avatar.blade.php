@props(['user' => false,'show'=>false])

@if ($user)
<div class="flex-grow-0 mb-1 text-xs font-medium text-gray-500 dark:text-gray-300 title-font ">
<div class="relative inline-block">
    @if ($user->getFirstMedia('avatar'))
    <img class="inline-block object-cover w-12 h-12 rounded-full" src="{{$user->getFirstMedia('avatar')->geturl()}}" alt="Profile image"/>
    @else
    <img class="object-cover w-8 h-8 rounded-full" src="https://eu.ui-avatars.com/api/?name={{ $user->name }}" alt="{{ $user->name }}" />
    @endif
     @if ($user->isOnline())
    <span class="absolute bottom-0 right-0 inline-block w-3 h-3 bg-green-600 border-2 border-white dark:border-gray-800 rounded-full"></span>
    @else
    <span class="absolute bottom-0 right-0 inline-block w-3 h-3 bg-red-600 border-2 border-white dark:border-gray-800 rounded-full"></span>
    @endif
</div>
@if ($show)
{{ $user->name}}
@endif
</div>
@endif