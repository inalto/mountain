<x-slot name="header">
    <h1 class="text-xl font-semibold leading-tight">
        {{ $report->title }}
    </h1>
</x-slot>


    <div class="w-full hero">
        <img class="w-full" @if ($report->cover) src="{{ $report->cover->getUrl() }}" alt="{{ $report->cover->getCustomProperty('alt') }}" @endif />
    </div>

    <div class="flex flex-wrap w-full">
    <div class="mx-auto prose prose-md">
        <h3 class="mb-1 text-xs font-medium text-gray-500 dark:text-gray-300 title-font ">
            {{ $report->created_by->name }}</h3>

            {!!$report->content!!}

    </div>
</div>
