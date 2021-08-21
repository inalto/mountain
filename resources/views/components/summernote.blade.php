<div wire:ignore>
    <textarea class="summernote" {{$attributes->wire('model')}} name="{{$attributes['name']}}" autocomplete="off" >
        {{ $slot }}
    </textarea>
</div>
@once
    @push('styles')
    <link href="https://cdn.jsdelivr.net/npm/summernote@latest/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@latest/dist/summernote-lite.min.js"></script>
    @endpush
@endonce
@push('scripts')
<script type="text/javascript" >
      $('.summernote').summernote({
          height: 400,
          toolbar: [
      ['style', ['style']],
      ['font', ['bold', 'underline', 'clear']],
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