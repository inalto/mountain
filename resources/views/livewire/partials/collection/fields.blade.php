<div class="media-library-field">
    <label class="media-library-label">{{ trans('global.title') }}</label>
    <input dusk="media-library-field-title" class="media-library-input" type="text" {{ $mediaItem->livewireCustomPropertyAttributes('title') }} />

    @error($mediaItem->customPropertyErrorName('title'))
    <p class="media-library-field-error">
        {{ $message }}
    </p>
    @enderror
</div>
<div class="media-library-field">
    <label class="media-library-label">{{ trans('global.author') }}</label>
    <input dusk="media-library-field-author" class="media-library-input" {{ $mediaItem->livewireCustomPropertyAttributes('author') }} />

    @error($mediaItem->customPropertyErrorName('author'))
    <p class="media-library-field-error">
        {{ $message }}
    </p>
    @enderror
</div>