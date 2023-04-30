@props(['tags' => []])


@if (count($tags)>0)
<div class="flex tags">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z" />
    </svg>
    <div class="flex flex-wrap ml-3">
        @foreach($tags as $tag)
        <a href="{{ route('reports.tag',['tag'=>$tag->slug])}}" class="inline-block whitespace-nowrap dark:bg-sky-800 px-2 mb-4 mr-3 text-xs leading-5 text-blue-500 bg-sky-100 font-medium rounded-full shadow-sm no-underline">{{$tag->name}}</a>
        @endforeach
    </div>
</div>
@endif