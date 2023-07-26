@props(['label' => null])
<div class="mb-4" x-data="{ check: function(n) { if ($wire.get('report')) { return ($wire.get('report.type') == n) ? true : false; } } }">
    @if ($label)
        <label for="report.type" class="block text-gray-700 text-sm font-bold mb-2">{{ $label }}</label>
    @endif
    <input type="hidden" {{ $attributes }} />
    <div class="flex mx-auto items-center rounded-md shadow-sm border-slate-200 border-solid">
        <div x-on:click="$wire.set('report.type',0)"
            class="cursor-pointer flex flex-col items-center justify-start p-2 w-14 h-14 rounded-l border-slate-200 hover:bg-indigo-600 hover:text-white"
            :class="{ 'bg-indigo-500 text-white': check(0), ' bg-slate-200': !check(0) }">
            <x-report.type type=0 />
            {{--<div class="text-xs">{{ __('global.type.ar') }}</div>--}}
        </div>
        <div x-on:click="$wire.set('report.type',1)"
            class="cursor-pointer flex flex-col items-center justify-start p-2 border-l w-14 h-14 border-slate-200 hover:bg-indigo-600 hover:text-white"
            :class="{ 'bg-indigo-500 text-white': check(1), ' bg-slate-200': !check(1) }">
            <x-report.type type=1 />
            {{--<div class="text-xs">{{ __('global.type.pcirc') }}</div>--}}
        </div>
        <div x-on:click="$wire.set('report.type',2)"
            class="cursor-pointer flex flex-col items-center justify-start p-2 border-l w-14 h-14 border-slate-200  hover:bg-indigo-600 hover:text-white"
            :class="{ 'bg-indigo-500 text-white': check(2), ' bg-slate-200': !check(2) }">
            <x-report.type type=2 />
            {{--<div class="text-xs">{{ __('global.type.circular') }}</div>--}}
        </div>

        <div x-on:click="$wire.set('report.type',3)"
            class="cursor-pointer flex flex-col items-center justify-start p-2 border-l rounded-r w-14 h-14 border-slate-200  hover:bg-indigo-600 hover:text-white "
            :class="{ 'bg-indigo-500 text-white': check(3), ' bg-slate-200': !check(3) }">
            <x-report.type type=3 />
            {{--<div class="text-xs">{{ __('global.type.crossing') }}</div>--}}
        </div>
    </div>
</div>
