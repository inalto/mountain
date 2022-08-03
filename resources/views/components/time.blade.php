@props(['disabled' => false,'left'=>'','right'=>'','type'=>'text'])

<div {{ $attributes->merge(['class' =>  'relative clockpicker']) }} >
    @if ($left)
    <div class="absolute inset-y-0 left-0 flex items-center px-2 pointer-events-none text-gray-400">
        {{$left}}
    </div>
    @endif

    @if ($right)
    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-400">
        {{$right}}
    </div>
    @endif
<input x-data x-ref="input" x-init="$($refs.input).clockpicker({autoclose:true,afterDone: function() {$dispatch('input',$refs.input.value)} })" type="time" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => (!empty($left)?'pl-8':'').(!empty($right)?'pr-8 text-right':'')]) !!}>

</div>


@once
@push('styles')
<link rel="stylesheet" type="text/css" href="/css/clockpicker.css">

@endpush
@push('scripts')
<script type="text/javascript"  src="/js/clockpicker.js" ></script>


@endpush
@endonce