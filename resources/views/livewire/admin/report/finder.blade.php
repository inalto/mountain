<div x-data class="relative">
    <x-jet-input class="w-full" wire:model.debounce="search" type="text" :placeholder="$title" />
    @if (count($reports) > 0)
    <div class="overflow-hidden z-10 absolute bg-white rounded-lg shadow-lg" x-on:click.away="$wire.closeWindow()">
        <div class="flex items-center justify-between p-2">
        <div wire:loading><x-loader /></div>    
            <div class="ml-auto p-2 cursor-pointer" wire:click="closeWindow">X</div>
        
        </div>
        @foreach($reports as $report)
        <div class="cursor-pointer p-2 hover:bg-yellow-100 min-w-[40rem]" wire:click="selectReport({{ $report->id }})">
            {{ $report->title }}
        </div>
        @endforeach
    </div>
    @endif
</div>