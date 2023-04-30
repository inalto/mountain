@props(['label'=>''])
<input type="text" {{ $attributes }} class="h-10 w-full shadow bg-white text-black dark:text-slate-200 dark:bg-slate-600 dark:border-slate-300 rounded"/>
@push('scripts')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script>

    function initDate() {
        flatpickr('#{{ $attributes["id"] }}',{
                dateFormat: "Y-m-d H:i:S",
                time_24hr: true,
                enableTime: true,
                disableMobile: true,
                onChange: function(selectedDates, dateStr, instance) {
                    @this.set("{{ $attributes['wire:model'] }}", dateStr)
                }
            })
    }

    document.addEventListener("DOMContentLoaded", function() {
        initDate();
    });

    document.addEventListener("livewire:load", () => {
        
        Livewire.hook('message.processed', (message, component) => {
            initDate()
        });
    });
</script>
@endpush