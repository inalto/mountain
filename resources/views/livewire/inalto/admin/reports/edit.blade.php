<x-admin.form-section submit="save">

  <x-slot name="form">

    <div class="col-span-6 md:col-span-3">
      <x-jet-label for="title" value="{{ __('Title') }}" />
      <x-jet-input wire:model="title" id="title" type="text" class="block w-full mt-1" />
      <x-jet-input-error for="name" class="mt-2" />
    </div>

    <div class="col-span-6 md:col-span-3">
      <x-jet-label for="slug" value="{{ __('Slug') }}" />
      <x-jet-input wire:model="slug" id="slug" type="text" class="block w-full mt-1" />
      <x-jet-input-error for="slug" class="mt-2" />
    </div>

    <div class="col-span-6 md:col-span-3">
      <x-jet-label for="excerpt" value="{{ __('cruds.report.fields.excerpt') }}" />
      <x-inputs.richtext id="excerpt" wire:model.lazy="excerpt" :content="$excerpt" />
    </div>
    <div class="col-span-6 md:col-span-3">
      <h2>{{ __('cruds.report.fields.details') }}</h2>
      
    </div>

    <div class="col-span-6">
        <x-jet-label for="access" value="{{ __('cruds.report.fields.access') }}" />
        <x-inputs.richtext id="access" wire:model.lazy="content" :content="$access" />
      </div>

      
    <div class="col-span-6">
      <x-jet-label for="content" value="{{ __('cruds.report.fields.description') }}" />
      <x-inputs.richtext id="content" wire:model.lazy="content" :content="$content" />
    </div>

<div class="col-span-6">
    <h2 class="inline mr-4 dark:text-gray-200">{{ __('cruds.report.fields.bibliography') }}</h2><button class="px-2 py-1 rounded dark:bg-gray-700 dark:text-gray-200" wire:click.prevent="addBibliography"><i class="fa fa-plus"></i></button>
    @foreach($bibliographies as $bibliography)

    <div class="grid grid-cols-6 gap-6">
    <div class="col-span-2">
        <x-jet-label for="bibliographies[{{$loop->index}}].title" value="{{ __('cruds.report.fields.title') }}" />
        <x-jet-input id="bibliographies[{{$loop->index}}].title" wire:model.lazy="bibliographies[{{$loop->index}}].title" :content="$bibliography['title']" class="block w-full mt-1"/>
        <x-jet-input-error for="name" class="mt-2" />  
    </div>
    <div class="col-span-2">
        <x-jet-label for="bibliographies[{{$loop->index}}].author" value="{{ __('cruds.report.fields.author') }}" />
        <x-jet-input id="bibliographies[{{$loop->index}}].author" wire:model.lazy="bibliographies[{{$loop->index}}].author" :content="$bibliography['author']" class="block w-full mt-1"/>
        <x-jet-input-error for="name" class="mt-2" />
    </div>
    <div class="col-span-1">
        <x-jet-label for="bibliographies[{{$loop->index}}].url" value="{{ __('cruds.report.fields.url') }}" />
        <x-jet-input id="bibliographies[{{$loop->index}}].url" wire:model.lazy="bibliographies[{{$loop->index}}].url" :content="$bibliography['url']" class="block w-full mt-1"/>
        <x-jet-input-error for="name" class="mt-2" />
        
    </div>
    <div class="col-span-1">
    <button class="px-2 py-1 rounded dark:bg-red-900 dark:text-gray-200" wire:click.prevent="addBibliography"><i class="fa fa-trash"></i></button>
    </div>
</div>
    @endforeach

</div>
  </x-slot>

  <x-slot name="actions">
    <x-jet-action-message class="mr-3" on="saved">
      {{ __('Saved.') }}
    </x-jet-action-message>

    <x-jet-button wire:loading.attr="disabled" wire:target="photo">
      {{ __('Save') }}
    </x-jet-button>
  </x-slot>
</x-admin.form-section>
{{--         <form method="POST" action="{{ route("admin.reports.update", [$report->id]) }}"
enctype="multipart/form-data">
@method('PUT')
@csrf
<div class="form-group">
  <x-jet-label class="required" for="title">{{ trans('cruds.report.fields.title') }}</x-jet-label>
  <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title"
    value="{{ old('title', $report->title) }}" required>
  @if($errors->has('title'))
  <span class="text-danger">{{ $errors->first('title') }}</span>
  @endif
  <span class="help-block">{{ trans('cruds.report.fields.title_helper') }}</span>
</div>
<div class="form-group">
  <x-jet-label for="slug">{{ trans('cruds.report.fields.slug') }}</x-jet-label>
  <input class="form-control {{ $errors->has('slug') ? 'is-invalid' : '' }}" type="text" name="slug" id="slug"
    value="{{ old('slug', $report->slug) }}">
  @if($errors->has('slug'))
  <span class="text-danger">{{ $errors->first('slug') }}</span>
  @endif
  <span class="help-block">{{ trans('cruds.report.fields.slug_helper') }}</span>
</div>
<div class="form-group">
  <x-jet-label>{{ trans('cruds.report.fields.difficulty') }}</x-jet-label>
  <select class="form-control {{ $errors->has('difficulty') ? 'is-invalid' : '' }}" name="difficulty" id="difficulty">
    <option value disabled {{ old('difficulty', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}
    </option>
    @foreach(App\Models\Report::DIFFICULTY_SELECT as $key => $label)
    <option value="{{ $key }}" {{ old('difficulty', $report->difficulty) === (string) $key ? 'selected' : '' }}>
      {{ $label }}</option>
    @endforeach
  </select>
  @if($errors->has('difficulty'))
  <span class="text-danger">{{ $errors->first('difficulty') }}</span>
  @endif
  <span class="help-block">{{ trans('cruds.report.fields.difficulty_helper') }}</span>
</div>
<div class="form-group">
  <x-jet-label for="excerpt">{{ trans('cruds.report.fields.excerpt') }}</x-jet-label>
  <textarea class="form-control {{ $errors->has('excerpt') ? 'is-invalid' : '' }}" name="excerpt"
    id="excerpt">{{ old('excerpt', $report->excerpt) }}</textarea>
  @if($errors->has('excerpt'))
  <span class="text-danger">{{ $errors->first('excerpt') }}</span>
  @endif
  <span class="help-block">{{ trans('cruds.report.fields.excerpt_helper') }}</span>
</div>
<div class="form-group">
  <x-jet-label for="content">{{ trans('cruds.report.fields.content') }}</x-jet-label>
  <textarea class="form-control ckeditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content"
    id="content">{!! old('content', $report->content) !!}</textarea>
  @if($errors->has('content'))
  <span class="text-danger">{{ $errors->first('content') }}</span>
  @endif
  <span class="help-block">{{ trans('cruds.report.fields.content_helper') }}</span>
</div>
<div class="form-group">
  <x-jet-label for="photos">{{ trans('cruds.report.fields.photos') }}</x-jet-label>
  <div class="needsclick dropzone {{ $errors->has('photos') ? 'is-invalid' : '' }}" id="photos-dropzone">
  </div>
  @if($errors->has('photos'))
  <span class="text-danger">{{ $errors->first('photos') }}</span>
  @endif
  <span class="help-block">{{ trans('cruds.report.fields.photos_helper') }}</span>
</div>
<div class="form-group">
  <x-jet-label for="tracks">{{ trans('cruds.report.fields.tracks') }}</x-jet-label>
  <div class="needsclick dropzone {{ $errors->has('tracks') ? 'is-invalid' : '' }}" id="tracks-dropzone">
  </div>
  @if($errors->has('tracks'))
  <span class="text-danger">{{ $errors->first('tracks') }}</span>
  @endif
  <span class="help-block">{{ trans('cruds.report.fields.tracks_helper') }}</span>
</div>
<div class="form-group">
  <x-jet-label for="categories">{{ trans('cruds.report.fields.categories') }}</x-jet-label>
  <div style="padding-bottom: 4px">
    <span class="select-all btn btn-info btn-xs" style="border-radius: 0">{{ trans('global.select_all') }}</span>
    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
  </div>
  <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]"
    id="categories" multiple>
    @foreach($categories as $id => $categories)
    <option value="{{ $id }}"
      {{ (in_array($id, old('categories', [])) || $report->categories->contains($id)) ? 'selected' : '' }}>
      {{ $categories }}</option>
    @endforeach
  </select>
  @if($errors->has('categories'))
  <span class="text-danger">{{ $errors->first('categories') }}</span>
  @endif
  <span class="help-block">{{ trans('cruds.report.fields.categories_helper') }}</span>
</div>
<div class="form-group">
  <x-jet-label for="tags">{{ trans('cruds.report.fields.tags') }}</x-jet-label>
  <div style="padding-bottom: 4px">
    <span class="select-all btn btn-info btn-xs" style="border-radius: 0">{{ trans('global.select_all') }}</span>
    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
  </div>
  <select class="form-control select2 {{ $errors->has('tags') ? 'is-invalid' : '' }}" name="tags[]" id="tags" multiple>
    @foreach($tags as $id => $tags)
    <option value="{{ $id }}" {{ (in_array($id, old('tags', [])) || $report->tags->contains($id)) ? 'selected' : '' }}>
      {{ $tags }}</option>
    @endforeach
  </select>
  @if($errors->has('tags'))
  <span class="text-danger">{{ $errors->first('tags') }}</span>
  @endif
  <span class="help-block">{{ trans('cruds.report.fields.tags_helper') }}</span>
</div>
<div class="form-group">
  <button class="btn btn-danger" type="submit">
    {{ trans('global.save') }}
  </button>
</div>
</form>
--}}