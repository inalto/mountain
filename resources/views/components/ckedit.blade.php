<div wire:ignore>
    <textarea id="{{$attributes['name']}}" name="{{$attributes['name']}}" autocomplete="off">
    {!! $slot !!}
    </textarea>
</div>
@once
@push('scripts')
<script src="{{asset('js/ckeditor.js') }}"></script>
@endpush
@endonce

@push('scripts')
<script>
    ClassicEditor
        .create(document.querySelector("#{{$attributes['name']}}"),  {})
        .then(editor => {
            editor.model.document.on('change:data', () => {
                @this.set("{{$attributes['wire:model']}}", editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        });
</script>

@endpush
</script>