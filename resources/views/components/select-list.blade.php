<div wire:ignore class="w-full">
    <select class="w-full" data-minimum-results-for-search="Infinity" data-placeholder="{{ __('Select your option') }}" {{ $attributes }}>
        @foreach($options as $key => $option)
            <option value="{{$key}}" selected="selected">{{$option}}</option>
        @endforeach
    </select>
</div>
@push('scripts')
    <script>
        document.addEventListener("livewire:load", () => {
    let el = $('#{{ $attributes['id'] }}')
    let buttonsId = '#{{ $attributes['id'] }}-btn-container'

    function initButtons() {
        $(buttonsId + ' .select-all-button').click(function (e) {
            el.val(_.map(el.find('option'), opt => $(opt).attr('value')))
            el.trigger('change')
        })

        $(buttonsId + ' .deselect-all-button').click(function (e) {
            el.val([])
            el.trigger('change')
        })
    }

    function initSelect () {
        initButtons()
        el.select2({
            ajax: {
                url: '/api/{{ $attributes['id'] }}',
                dataType: 'json',
                minimumInputLength: 2,
                delay: 250,
                processResults: function (data) {
               //     console.log(data);
                    return {
                        results: data
                    };
                }
            },
            multiple: el.attr('multiple') ? true : false,
            placeholder: '{{ __('Select your option') }}',
            allowClear: !el.attr('required')
        })
    }
$(document).ready(function() {
    initSelect()
});

    Livewire.hook('message.processed', (message, component) => {
        initSelect()
    });

    el.on('change', function (e) {
        let data = $(this).select2("val")
        if (data === "") {
            data = null
        }
@this.set('{{ $attributes['wire:model'] }}', data)
    });
});
    </script>
@endpush