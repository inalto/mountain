<div class="pt-3">
    @foreach($hbts as $hbt)
    
    <div class="hbt-row">
        <div class="flex justify-between">
        <x-avatar :user="$hbt->owner()->first()" show="true" info="test"/>
        <div class="text-right leading-tight">
            <a href="{{ route('report.show', ($hbt->report?->categories->first()?$hbt->report?->categories->first()->slug:'none').'/'.$hbt->report?->slug) }}" class="m-0 p-0">{{ $hbt->report?->title }}</a><br/>
            <span class="text-sm italic text-gray-500">
        <?= \Carbon\Carbon::parse($hbt['created_at'])->locale('it')->translatedFormat('l d F Y')?>
</span>
</div>
        </div>
        @if($hbt->photos->count())
        <div class="flex flex-wrap -ml-2 py-1">
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
    <x-jet-button wire:click="create" class="mr-2">{{ trans('global.havebeentherefirst') }}</x-jet-button>
    @else
    <x-jet-button wire:click="create"  class="mr-2">{{ trans('global.havebeenthere') }}</x-jet-button>
    @endif

    @if($isModalOpen)
    @if($isEdit)
    @include('livewire.frontend.have-been-there.edit')
    @else
    @include('livewire.frontend.have-been-there.create')
    @endif
    @endif
</div>