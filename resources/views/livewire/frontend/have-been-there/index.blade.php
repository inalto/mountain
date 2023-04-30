<div class="relative pt-3">
    @foreach($hbts as $hbt)

    <div class="hbt-row">
        <div class="flex justify-between">
            <x-avatar :user="$hbt->owner()->first()" show="true" info="test" />
            <div class="flex space-x-2 text-right leading-tight">
                <div>
                    <a href="{{ route('report.show', ($hbt->report?->category->translate()?$hbt->report?->category->translate()->slug:'none').'/'.$hbt->report?->slug) }}" class="m-0 p-0">{{ $hbt->report?->title }}</a><br />
                    <span class="text-sm italic text-gray-500">
                        <?= \Carbon\Carbon::parse($hbt['date'])->locale('it')->translatedFormat('l d F Y') ?>
                    </span>
                </div>
                @if (auth()->user() && auth()->user()->id == $hbt->owner_id)
                <x-dropdown-edit :id="$hbt->id" ></x-dropdown-edit>
                @endif
            </div>
        </div>

        <div class="mb-4 dark:text-gray-200">
            <h2 class="text-2xl font-bold">{{ $hbt->title }}</h2>
            {!! $hbt->content !!}
        </div>
        @if($hbt->photos->count())
        <div class="flex flex-wrap -ml-2 py-1">
            @foreach ($hbt->photos as $photo)
            <a href="{{ $photo['url'] }}" data-caption="{{$photo['custom_properties']['title']??''}}" data-fancybox="gallery-{{$hbt->id}}"><img src="{{ $photo['preview_url'] }}" class="ml-2 rounded-lg w-32 h-32 border-8 shadow-lg border-white dark:border-black" alt="" /></a>
            @endforeach
        </div>
        @endif
    </div>
    @endforeach
    {{$hbts->links()}}

    @if (auth()->user())
    @if ($hbts->count()==0)
    <x-a wire:click="new()" class="mr-2">{{ trans('global.havebeentherefirst') }}</x-a>
    @else
    <x-a wire:click="new()" class="mr-2">{{ trans('global.havebeenthere') }}</x-a>
    @endif

    {{-- Modal --}}

    <form wire:submit.prevent="save">
    <x-modal.dialog wire:model.defer="isModalOpen">
        <x-slot name="title">{{__('Edit')}}</x-slot>
        <x-slot name="content">


        <input type="hidden" name="owner_id" id="owner_id" wire:model="editing.owner_id" />
    <input type="hidden" name="report_id" id="report_id" required wire:model="editing.report_id" />

    <div class="flex gap-10">
        <div class="w-full md:w-1/3 mb-2 form-group {{ $errors->has('date') ? 'invalid' : '' }}">
            <x-label class="form-label " for="title">{{ trans('cruds.havebeenthere.fields.date') }}</x-label>
            <x-datetime-picker class="w-full form-control" type="text" name="editing.date" id="date" wire:model="editing.date" />

            <div class="validation-message">
                {{ $errors->first('editing.date') }}
            </div>
        </div>
        <div class="w-full md:w-1/3 mb-2 form-group {{ $errors->has('editing.time_a') ? 'invalid' : '' }}">
            <x-label class="form-label" for="time_a">{{ trans('cruds.report.fields.time_a') }}</x-label>
            <x-time type="time" class="w-full form-control" name="editing.time_a" id="time_a" wire:model="editing.time_a" />
            <div class="validation-message">
                {{ $errors->first('editing.time_a') }}
            </div>
        </div>

        <div class="w-full md:w-1/3 mb-2 form-group {{ $errors->has('editing.time_r') ? 'invalid' : '' }}">
            <x-label class="form-label" for="time_r">{{ trans('cruds.report.fields.time_r') }}</x-label>
            <x-time type="time" class="w-full form-control" name="editing.time_r" id="time_r" wire:model="editing.time_r" />
            <div class="validation-message">
                {{ $errors->first('havebeentheret.time_r') }}
            </div>
        </div>
    </div>
    <div class="flex gap-10">
        <div class="w-full  mb-2 form-group {{ $errors->has('editing.title') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="title">{{ trans('cruds.havebeenthere.fields.title') }}</x-label>
            <x-input class="w-full form-control" type="text" name="editing.title" id="title" required wire:model="editing.title" />
            <div class="validation-message">
                {{ $errors->first('title') }}
            </div>

        </div>
    </div>
    <div class="form-group {{ $errors->has('editing.content') ? 'invalid' : '' }}">
        <div class="flex text-sm">
        <x-info> 
        <p>Indica possibilmente le condizioni del sentiero, se hai trovato sono tratti esposti o pericoli durante l'escursione.</p>
        <p>Come erano le condizioni meteo? il sentiero era praticabile?</p>
        <p>Puoi anche segnalare se il percorso era affollato o se hai avvistato fauna o flora.</p>
        <p>Se hai fatto amicizia con qualcuno durante l'escursione, puoi indicarlo qui.</p>
        <p>Se hai fatto foto o tracciati GPS, puoi caricarli qui sotto.</p>
       </x-info>
        <x-label class="pt-2 form-label" for="content">{{ trans('cruds.havebeenthere.fields.content') }}</x-label>
        
        </div>

        <x-ckedit id="editor" rows="3" wire:model.defer="editing.content" name="editing.content" class="w-full" :value="$editing->content">
       sss {{$editing->content}}
        </x-ckedit>
        
        <div class="validation-message">
            {{ $errors->first('editing.content') }}
        </div>
        
    </div>
    
    
    <h2 class="text-xl my-2">Foto</h2>
    
    <x-media-library-collection name="photos" :model="$editing" collection="havebeenthere_photos" fields-view="livewire.partials.collection.fields"  />

    <h2 class="text-xl my-2">Tracciati GPS</h2>
    <x-media-library-collection name="tracks" :model="$editing" @endif collection="havebeenthere_tracks" fields-view="livewire.partials.collection.fields"  />
    



        </x-slot>
        <x-slot name="footer">
            <x-button.secondary wire:click.prevent="$toggle('isModalOpen')">
                {{ __('Cancel') }}
            </x-button.secondary>

            <x-button.primary type="subnit" class="ml-2" >
                {{ __('Save') }}
            </x-button.primary>
        </x-slot>
    </x-modal.dialog>
    </form>
    @else
    <x-a href="{{route('login')}}" class="mr-2">{{ trans('global.login_to_post') }}</x-a>

    @endif

</div>