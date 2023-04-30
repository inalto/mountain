@props(['photos','year'=>now()->format('Y'),'author'=>false])

@if ($photos && (count($photos) > 0))
<div class="prose mb-4">
    <h2>Galleria fotografica</h2>
</div>


<div class="grid gap-2 grid-cols-1 md:grid-cols-4 lg:grid-cols-6">
    @foreach($photos as $photo)
    <?php
     if (array_key_exists('title',$photo['custom_properties'])){
        $caption = $photo['custom_properties']['title'];
     } else {
        $caption = '';
     }
     // get year from photo
     $year=substr($photo['created_at'],0,4);

    if (array_key_exists('author',$photo['custom_properties'])){
    ?>
    <div class="photo shadow-lg  rounded bg-white dark:bg-gray-800 overflow-hidden">
        <a href="{{$photo['url']}}" data-fancybox="gallery" data-caption="{{$caption}}"><img src="{{$photo['preview_thumbnail']}}" class=" w-full h-auto border-none" /></a>
        <div class="text-xs text-gray-700 dark:text-gray-500 text-center p-2">{{$caption??''}}</div>
        <div class="text-xs text-gray-700 dark:text-gray-500 text-center p-2">&copy; {{$year}} - {{$photo['custom_properties']['author']?$photo['custom_properties']['author']:$author?->first_name.' '.$author?->last_name}}</div>
    </div>
    <?php } else { ?>
        <div class="photo shadow-lg rounded bg-white dark:bg-gray-800 overflow-hidden">
        <a href="{{$photo['url']}}" data-fancybox="gallery" data-caption="{{$caption}}"><img src="{{$photo['preview_thumbnail']}}" class=" w-full h-auto border-none" /></a>
        <div class="text-xs text-gray-700 dark:text-gray-500 text-center p-2">{{$caption??''}}</div>
        <div class="text-xs text-gray-700 dark:text-gray-500 text-center p-2">&copy; {{$year}} - {{$author?->first_name}} {{$author?->last_name}}</div>
    </div>
    <?php } ?>
    @endforeach
</div>

@endif
@once
@push('scripts')
<script type="text/javascript" src="/js/fancybox.js"></script>
@endpush
@endonce