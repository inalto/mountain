<form wire:submit.prevent="submit" class="p-3">

    <div class="form-group {{ $errors->has('contentPage.title') ? 'invalid' : '' }}">
        <x-jet-label class="form-label required" for="title">{{ trans('cruds.contentPage.fields.title') }}</x-jet-label>
         <x-jet-input type="text" name="title" id="title" required wire:model.defer="contentPage.title"/>
        <div class="validation-message">
            {{ $errors->first('contentPage.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contentPage.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('category') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="category">{{ trans('cruds.contentPage.fields.category') }}</x-jet-label>
        <x-select-list class="form-control" id="category" name="category" wire:model="category" :options="$this->listsForFields['category']" multiple />
        <div class="validation-message">
            {{ $errors->first('category') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contentPage.fields.category_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('tag') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="tag">{{ trans('cruds.contentPage.fields.tag') }}</x-jet-label>
        <x-select-list class="form-control" id="tag" name="tag" wire:model="tag" :options="$this->listsForFields['tag']" multiple />
        <div class="validation-message">
            {{ $errors->first('tag') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contentPage.fields.tag_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('contentPage.page_text') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="page_text">{{ trans('cruds.contentPage.fields.page_text') }}</x-jet-label>
        <textarea class="form-control" name="page_text" id="page_text" wire:model.defer="contentPage.page_text" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('contentPage.page_text') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contentPage.fields.page_text_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('contentPage.excerpt') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="excerpt">{{ trans('cruds.contentPage.fields.excerpt') }}</x-jet-label>
        <textarea class="form-control" name="excerpt" id="excerpt" wire:model.defer="contentPage.excerpt" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('contentPage.excerpt') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contentPage.fields.excerpt_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.content_page_featured_image') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="featured_image">{{ trans('cruds.contentPage.fields.featured_image') }}</x-jet-label>
        <x-dropzone id="featured_image" name="featured_image" action="{{ route('admin.content-pages.storeMedia') }}" collection-name="content_page_featured_image" max-file-size="2" max-width="4096" max-height="4096" max-files="1" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.content_page_featured_image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.contentPage.fields.featured_image_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-jet-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.content-pages.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>