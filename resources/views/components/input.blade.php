@props(['disabled' => false,'left'=>'','right'=>''])

<div class="relative">
    @if ($left)
    <div class="absolute inset-y-0 leftt-0 flex items-center px-2 pointer-events-none text-gray-400">
        {{$left}}
    </div>
    @endif
    @if ($right)
    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-400">
        {{$right}}
    </div>
    @endif
<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ($left?'pl-8':'').($right?'pr-8 text-right':'').' border-gray-300 border-b-2 focus:outline-none focus:border-blue-800']) !!}>
</div>
