@props(['content'=>'','id'=>'x'])

<div
    wire:ignore
    {{ $attributes }}
    x-data
    @trix-blur="$dispatch('change',$event.target.value)"
    >
  
    <input id="{{$id}}" type="hidden" value="{{ $content }}">
  <trix-editor input="{{$id}}" class="rounded-md shadow-sm form-input dark:bg-gray-900 dark:border-gray-700 dark:text-gray-200"></trix-editor>
</div>

@push('styles')
<link rel="stylesheet" type="text/css" href="/css/trix.css">
@endpush

@push('scripts')
<script type="text/javascript" src="/js/trix.js"></script>
@endpush