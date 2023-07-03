@props(['name', 'value' => null])
<div wire:ignore class="w-full pb-16" x-data="{
    content: @entangle($attributes->wire('model')->value),
    quill: null,
    init() {
        this.quill = new Quill($refs.editor, {
            theme: 'snow'
        });
        this.quill.root.innerHTML = this.content;
        this.quill.on('text-change', () => {
            this.content = this.quill.root.innerHTML
        });
    }
}">

    <div class="w-full min-h-32" x-ref="editor"></div>
</div>
@once
@push('styles')
    <link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.7/quill.js"></script>
@endpush
@endonce
