<div class="flex flex-wrap">
    
    @forelse ($reports as $report)
    
        <div class="w-full p-1 md:w-1/2 lg:w-1/3 xl:w-1/4 ">
            <div class="h-full overflow-hidden rounded-lg shadow-lg">
                <a href="{{ route('report.show', $report->slug) }}"><img class="object-cover object-center w-full h-48" @if ($report->media) src="{{ $report->getFirstMediaUrl('photos') }}" alt="" @endif /></a>
                <div class="p-3 bg-white dark:bg-gray-800">
                    <h3 class="mb-1 text-xs font-medium text-gray-500 dark:text-gray-300 title-font ">
                        {{ $report->owner->name}}</h3>
                    <h2 class="mb-3 text-lg font-medium text-gray-900 dark:text-gray-100 title-font">
                        {{ $report->title }}
                    </h2>
                    <p class="mb-3 leading-relaxed">{!! Str::of($report->excerpt)->words(20,'...') !!}</p>
                    <div class="flex justify-between">
                        <div>
                            <span
                                class="inline-flex items-center py-1 pr-3 ml-auto mr-3 text-sm leading-none text-gray-600 border-r-2 border-gray-300 lg:ml-auto md:ml-0">
                                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>{{ $report->id }}
                            </span>
                            <span class="inline-flex items-center text-sm leading-none text-gray-600">
                                <svg class="w-4 h-4 mr-1" stroke="currentColor" stroke-width="2" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                                    <path
                                        d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z">
                                    </path>
                                </svg>6
                            </span>
                        </div>
                        <div>
                            <a class="inline-flex items-center text-blue-500 md:mb-2 lg:mb-0">Leggi
                                <svg class="w-4 h-4 ml-2" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M5 12h14"></path>
                                    <path d="M12 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>No Report</p>
    @endforelse

    {{ $reports->links() }}

</div>


