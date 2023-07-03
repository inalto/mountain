@props(['label'=>''])
<div x-data="{
    init() {
        let picker = flatpickr(this.$refs.picker,{
                dateFormat: 'Y-m-d H:i:S',
                time_24hr: true,
                enableTime: true,
                disableMobile: true,
                onChange: function(selectedDates, dateStr, instance) {
                    @this.set('{{ $attributes['wire:model.defer'] }}{{ $attributes['wire:model'] }}', dateStr)
                }
            })
    }
}">
<input type="text" {{ $attributes }} class="h-10 w-full shadow bg-white text-black dark:text-slate-200 dark:bg-slate-600 dark:border-slate-300 rounded" x-ref="picker"/>
</div>
@push('scripts')
@once
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
@endonce
@endpush