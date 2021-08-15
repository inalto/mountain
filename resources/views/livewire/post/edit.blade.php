<form wire:submit.prevent="submit" class="p-3">

    <div class="form-group {{ $errors->has('post.title') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="title">{{ trans('cruds.post.fields.title') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="title" id="title" wire:model.defer="post.title">
        <div class="validation-message">
            {{ $errors->first('post.title') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.title_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('post.slug') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="slug">{{ trans('cruds.post.fields.slug') }}</x-jet-label>
        <x-jet-input class="form-control" type="text" name="slug" id="slug" wire:model.defer="post.slug">
        <div class="validation-message">
            {{ $errors->first('post.slug') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.slug_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('post.excerpt') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="excerpt">{{ trans('cruds.post.fields.excerpt') }}</x-jet-label>
        <textarea class="form-control" name="excerpt" id="excerpt" wire:model.defer="post.excerpt" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('post.excerpt') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.excerpt_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('post.content') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="content">{{ trans('cruds.post.fields.content') }}</x-jet-label>
        <textarea class="form-control" name="content" id="content" wire:model.defer="post.content" rows="4"></textarea>
        <div class="validation-message">
            {{ $errors->first('post.content') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.content_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('mediaCollections.post_photo') ? 'invalid' : '' }}">
        <x-jet-label class="form-label" for="photo">{{ trans('cruds.post.fields.photo') }}</x-jet-label>
        <x-dropzone id="photo" name="photo" action="{{ route('admin.posts.storeMedia') }}" collection-name="post_photo" max-file-size="2" max-width="4096" max-height="4096" />
        <div class="validation-message">
            {{ $errors->first('mediaCollections.post_photo') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.post.fields.photo_helper') }}
        </div>
    </div>

    <div class="form-group">
        <x-jet-button class="mr-2" type="submit">
            {{ trans('global.save') }}
        </x-jet-button>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>