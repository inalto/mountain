<textarea {{ $attributes }} wire:ignore>
    {!! $slot !!}
</textarea>
@push('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
@push('scripts')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endpush
@push('scripts')
<script>
  var quill = new Quill("#{{ $attributes['id'] }}", {
    theme: 'snow'
  });
</script>
    
@endpush