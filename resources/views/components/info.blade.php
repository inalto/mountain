<div x-data="{open:false}" class="relative p-1">
    <div class="flex cursor-help" x-on:click="open=true" x-on:click.away="open=false">
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
</svg>

    </div>
    <div class="absolute z-20 left-4  min-w-[320px] md:min-w-[640px] bg-white shadow-lg rounded-lg p-4" x-cloak x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90">
        <div class="mt-2">
            <p class="text-xs text-gray-700">
               {{$slot}}
            </p>
        </div>
    </div>

</div>