@php 
$id=uniqid();
 @endphp
<div wire:ignore>
    <textarea class="summernote" {{$attributes->wire('model')}} id="{{$id}}" autocomplete="off">
    {{ $slot }}
    </textarea>
    
</div>
@once
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@latest/dist/summernote-lite.min.css" rel="stylesheet">
@endpush
@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@latest/dist/summernote-lite.min.js"></script>
@endpush
@endonce
@push('scripts')
<script type="text/javascript">
    
    $("#{{$id}}").summernote({
            height: 400,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onChange: function(e) {
                    @this.set("{{ $attributes['wire:model'] }}", e);
                }
            }

        });
    
</script>

@endpush