@props(['value' => ''])
<div wire:ignore>
    <div id="{{$attributes['id']}}-loader" class="flex justify-center items-center bg-gray-50 rounded-lg h-20">
       <x-loader></x-loader>
    </div>
    <textarea style="display:none" id="{{$attributes['id']}}" wire:model.defer="{{$attributes['wire:model.defer']}}" name="{{$attributes['name']}}" autocomplete="off">
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
console.log('test');

document.addEventListener('DOMContentLoaded', function () {
    ClassicEditor
        .create(document.getElementById("{{$attributes['id']}}"))
        .then(editor => {
            window.addEventListener('formLoaded', () => {
                console.log('formLoaded'+$wire.get("{{$attributes['wire:model']}}"));
            })

            editor.model.document.on('change:data', () => {
                @this.set("{{$attributes['wire:model.defer']}}", editor.getData());
            })
        })
        .catch(error => {
            console.error(error);
        }).finally(() => {
            document.getElementById("{{$attributes['id']}}-loader").style.display = 'none';
        });
    }, false);

</script>

@endpush
</script>