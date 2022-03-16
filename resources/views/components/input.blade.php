@props(['disabled' => false,'left'=>'','right'=>'','type'=>'text'])

<div @class(['relative','clockpicker'=>($type=='time')]) >
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
<input type="{{$type}}" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => (!empty($left)?'pl-8':'').(!empty($right)?'pr-8 text-right':'')]) !!}>

</div>



@push('styles')
@if($type=='time')

<link rel="stylesheet" type="text/css" href="/css/clockpicker.css">
@endif
@endpush

@push('scripts')
@if($type=='time')
<script type="text/javascript"  src="/js/clockpicker.js" ></script>

<script type="text/javascript">
$( document ).ready(function() {
    $('.clockpicker').clockpicker( {autoclose:true});

});
       </script>
       @endif
@endpush

