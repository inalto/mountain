@props(['disabled' => false,'left'=>'','right'=>'','type'=>'text'])

<div {{ $attributes->merge(['class' => 'relative']) }}>
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
<input type="{{$type}}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => ($left?'pl-8':'').($right?'pr-8 text-right':'').' w-full py-2 border-gray-300 border-b focus:outline-none focus:border-blue-800']) !!}>

</div>
