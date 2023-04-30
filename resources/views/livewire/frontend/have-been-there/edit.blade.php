<form wire:submit.prevent="submit" class="p-3">
    <input type="hidden" name="owner_id" id="owner_id" wire:model="havebeenthere.owner_id" />
    <input type="hidden" name="report_id" id="report_id" required wire:model="havebeenthere.report_id" />

    <div class="flex gap-10">
        <div class="w-full md:w-1/3 mb-2 form-group {{ $errors->has('havebeenthere.date') ? 'invalid' : '' }}">
            <x-label class="form-label " for="title">{{ trans('cruds.havebeenthere.fields.date') }}</x-label>
            <x-datetime-picker class="w-full form-control" type="text" name="havebeenthere.date" id="havebeenthere.date" wire:model="havebeenthere.date" />

            <div class="validation-message">
                {{ $errors->first('date') }}
            </div>
            {{--
            <div class="help-block">
                {{ trans('cruds.havebeenthere.fields.date_helper') }}
            </div>

            --}}
        </div>
        <div class="w-full md:w-1/3 mb-2 form-group {{ $errors->has('havebeenthere.time_a') ? 'invalid' : '' }}">
            <x-label class="form-label" for="time_a">{{ trans('cruds.report.fields.time_a') }}</x-label>
            <x-time type="time" class="w-full form-control" name="havebeenthere.time_a" id="havebeenthere.time_a" wire:model="havebeenthere.time_a" />
            <div class="validation-message">
                {{ $errors->first('time_a') }}
            </div>
            {{--
            <div class="help-block">
                {{ trans('cruds.report.fields.time_a_helper') }}
            </div>
            --}}
        </div>

        <div class="w-full md:w-1/3 mb-2 form-group {{ $errors->has('havebeenthere.time_r') ? 'invalid' : '' }}">
            <x-label class="form-label" for="time_r">{{ trans('cruds.report.fields.time_r') }}</x-label>
            <x-time type="time" class="w-full form-control" name="time_r" id="time_r" wire:model="time_r" />
            <div class="validation-message">
                {{ $errors->first('havebeentheret.time_r') }}
            </div>
            {{--
            <div class="help-block">
                {{ trans('cruds.report.fields.time_r_helper') }}
            </div>

            --}}
        </div>
    </div>
    <div class="flex gap-10">
        <div class="w-full  mb-2 form-group {{ $errors->has('havebeenthere.title') ? 'invalid' : '' }}">
            <x-label class="form-label required" for="title">{{ trans('cruds.havebeenthere.fields.title') }}</x-label>
            <x-input class="w-full form-control" type="text" name="havebeenthere.title" id="havebeenthere.title" required wire:model="havebeenthere.title" />
            <div class="validation-message">
                {{ $errors->first('title') }}
            </div>
            {{--
            <div class="help-block">
                {{ trans('cruds.havebeenthere.fields.title_helper') }}
            </div>
            --}}
        </div>
    </div>
    <div class="form-group {{ $errors->has('havebeenthere.content') ? 'invalid' : '' }}">
        <div class="flex text-sm">
        <x-info> 
        <p>Indica possibilmente le condizioni del sentiero, se hai trovato sono tratti esposti o pericoli durante l'escursione.</p>
        <p>Come erano le condizioni meteo? il sentiero era praticabile?</p>
        <p>Puoi anche segnalare se il percorso era affollato o se hai avvistato fauna o flora.</p>
        <p>Se hai fatto amicizia con qualcuno durante l'escursione, puoi indicarlo qui.</p>
        <p>Se hai fatto foto o tracciati GPS, puoi caricarli qui sotto.</p>
       </x-info>
        <x-label class="pt-2 form-label" for="havebeenthere.content">{{ trans('cruds.havebeenthere.fields.content') }}</x-label>
        
        </div>

        <x-ckedit id="editor" rows="3" wire:model.defer="havebeenthere.content" name="havebeenthere.content" class="w-full" >
{!!$havebeenthere->content!!}

        </x-ckedit>
    
          
        <div class="validation-message">
            {{ $errors->first('havebeenthere.content') }}
        </div>
        {{--
        <div class="help-block">
            {{ trans('cruds.havebeenthere.fields.content_helper') }}
        </div>

        --}}
    </div>
    
    
    <h2 class="text-xl my-2">Foto</h2>
    
    <x-media-library-collection name="photos" :model="$havebeenthere" collection="havebeenthere_photos" fields-view="livewire.partials.collection.fields"  />

    <h2 class="text-xl my-2">Tracciati GPS</h2>
    <x-media-library-collection name="tracks" :model="$havebeenthere" @endif collection="havebeenthere_tracks" fields-view="livewire.partials.collection.fields"  />

    <div class="form-group  flex justify-between mt-4">
        <div>
            <x-jet-button class="mr-2" type="submit" wire:click.prevent="save">
                {{ trans('global.save') }}
            </x-jet-button>
            <x-jet-button class="mr-2" type="submit" wire:click.prevent="cancel">
                {{ trans('global.cancel') }}
            </x-jet-button>
        </div>
        
    </div>

</form>