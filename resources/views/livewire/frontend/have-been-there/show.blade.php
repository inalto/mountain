<div class="pt-3">
    @foreach($hbts as $hbt)
    
    <div class="hbt-row">
        <div class="flex justify-between">
        <x-avatar :user="$hbt->owner()->first()" show="true" info="test"/>
        <?= \Carbon\Carbon::parse($hbt['date'])->locale('it')->translatedFormat('l d F Y')?>
        </div>
        @if($hbt->photos->count())
        <div class="flex flex-wrap -ml-2 py-4">
            @foreach ($hbt->photos as $photo)
            
            <a href="{{ $photo['url'] }}" data-caption="{{$photo['custom_properties']['title']}}" data-fancybox="gallery-{{$hbt->id}}" ><img  src="{{ $photo['preview_url'] }}" class="ml-2 rounded-lg w-32 h-32 border-8 shadow-lg border-white dark:border-black"  alt="" /></a>
            @endforeach
        </div>
        @endif
        <div class="mb-4">
            {!! $hbt->content !!}
        </div>
    </div>
    @endforeach
    {{$hbts->links()}}
    @if ($hbts->count()==0)
    <x-jet-button class="mr-2">{{ trans('global.havebeentherefirst') }}</x-jet-button>
    @else
    <x-jet-button class="mr-2">{{ trans('global.havebeenthere') }}</x-jet-button>
    @endif
</div>