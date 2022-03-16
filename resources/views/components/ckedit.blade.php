<div wire:ignore>

<textarea id="{{$attributes['name']}}" name="{{$attributes['name']}}" autocomplete="off">
{!! $slot !!}
</textarea>    
{{--
    <textarea class="editor" {{$attributes->wire('model')}} id="{{$attributes['name']}}" name="{{$attributes['name']}}" autocomplete="off" >
        {{ $slot }}
    </textarea>
--}}

</div>
@once
@push('scripts')
<script src="{{ mix('js/ckeditor.js') }}"></script>
@endpush
@endonce

@push('scripts')
<script>

ClassicEditor
        .create(document.querySelector( "#{{$attributes['name']}}" ), {
            
            alignment: {
            options: [ 'left', 'right','center' ]
        },
            toolbar: {
    items: [
        'heading', '|',
        'alignment', '|',
        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
        'link', '|',
        'bulletedList', 'numberedList', 'todoList',
        
        'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
        'code', 'codeBlock', '|',
        'insertTable', '|',
        'outdent', 'indent', '|',
        'uploadImage', 'blockQuote', '|',
        'undo', 'redo'
    ],
    shouldNotGroupWhenFull: true
}
        } )
        .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set("{{$attributes['wire:model']}}", editor.getData());
                })
        })
        .catch( error => {
            console.error( error );
        } );

</script>

@endpush
</script>
    