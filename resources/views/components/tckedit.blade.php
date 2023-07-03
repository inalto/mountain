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
<script src="{{asset('js/ckeditor/ckeditor.js') }}"></script>
@endpush
@endonce

@push('scripts')
<script>
CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker', 'editing' ] },
		{ name: 'forms', groups: [ 'forms' ] },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi', 'paragraph' ] },
		{ name: 'links', groups: [ 'links' ] },
		{ name: 'insert', groups: [ 'insert' ] },
		'/',
		{ name: 'styles', groups: [ 'styles' ] },
		{ name: 'colors', groups: [ 'colors' ] },
		{ name: 'tools', groups: [ 'tools' ] },
		{ name: 'others', groups: [ 'others' ] },
		{ name: 'about', groups: [ 'about' ] }
	];
};
{{$attributes['name']}} = CKEDITOR.replace("{{$attributes['name']}}");
{{$attributes['name']}}.on('change:data', (evt) => {
                    @this.set("{{$attributes['wire:model']}}", evt.editor.getData());
                });

</script>

@endpush
</script>
    