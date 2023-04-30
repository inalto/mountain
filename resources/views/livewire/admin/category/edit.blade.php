<form wire:submit.prevent="submit">

<input name="id" type="hidden" value="{{$category['id']}}">
    <div class="flex flex-wrap text-sm text-center pt-5 pb-4 ">
        @foreach ($locales as $loc)
        <a wire:click="setLocale('{{$loc}}')" class="inline-block w-full md:w-1/2 lg:w-auto mb-4 lg:mb-0 px-4 pb-2 border-b-2 @if($loc==$locale) border-indigo-500 text-indigo-500 @else text-gray-300 border-b-2 border-transparent hover:border-gray-300 @endif " href="#">{{$loc}}</a>
        @endforeach
    </div>

        @foreach ($locales as $loc)
        @php
            $name="category".'.'.$loc.'.name';
            $slug="category".'.'.$loc.'.slug';
            $description="category".'.'.$loc.'.description';
         @endphp
         <div class="mb-4 @if($loc!=$locale) hidden @endif">
        <div class="flex space-x-2">
            <div class="w-1/2 form-group {{ $errors->has('category.name') ? 'invalid' : '' }}">
                <x-label class="form-label" for="name">{{ __('cruds.category.fields.name') }}</x-label>
                <x-input type="text" class="form-control @error($name) border-red-600 @enderror" id="{{$name}}" placeholder="" wire:model.lazy="{{$name}}" name="{{$name}}" />
                <div class="validation-message">
                    {{ $errors->first('category.name') }}
                </div>
                <div class="help-block">
                    {{ __('cruds.category.fields.name_helper') }}
                </div>
            </div>
            <div class="w-1/2 form-group {{ $errors->has('category.slug') ? 'invalid' : '' }}">
                <x-label class="form-label" for="slug">{{ __('cruds.category.fields.slug') }}</x-label>
                <x-input type="text" class="form-control @error($slug) border-red-600 @enderror" id="{{$slug}}" placeholder="" wire:model.lazy="{{$slug}}" name="{{$slug}}" />

                <div class="validation-message">
                    {{ $errors->first('category.slug') }}
                </div>
                <div class="help-block">
                    {{ __('cruds.category.fields.slug_helper') }}
                </div>
            </div>
        </div>
        <div class="form-group {{ $errors->has('category.description') ? 'invalid' : '' }}">
            <x-label class="form-label" for="description">{{ __('cruds.category.fields.description') }}</x-label>
            <textarea class="form-control" name="description" id="{{$description}}" name="{{$description}}"  wire:model.defer="{{$description}}" rows="4"></textarea>
            <div class="validation-message">
                {{ $errors->first('category.description') }}
            </div>
            <div class="help-block">
                {{ __('cruds.category.fields.description_helper') }}
            </div>
        </div>
        </div>
        @endforeach
    


    <div class="form-group">
        <x-jet-button class="mr-2" type="submit" wire:click.prevent="store()">
            {{ __('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
            {{ __('global.cancel') }}
        </a>
    </div>
</form>