<?php

namespace App\Http\Livewire\ContentPage;

use App\Models\ContentCategory;
use App\Models\ContentPage;
use App\Models\ContentTag;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public array $tag = [];

    public array $category = [];

    public ContentPage $contentPage;

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function mount(ContentPage $contentPage)
    {
        $this->contentPage = $contentPage;
        $this->category    = $this->contentPage->category()->pluck('id')->toArray();
        $this->tag         = $this->contentPage->tag()->pluck('id')->toArray();
        $this->initListsForFields();
        $this->mediaCollections = [
            'content_page_featured_image' => $contentPage->featured_image,
        ];
    }

    public function render()
    {
        return view('livewire.content-page.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->contentPage->save();
        $this->contentPage->category()->sync($this->category);
        $this->contentPage->tag()->sync($this->tag);
        $this->syncMedia();

        return redirect()->route('admin.content-pages.index');
    }

    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

    protected function rules(): array
    {
        return [
            'contentPage.title' => [
                'string',
                'required',
            ],
            'category' => [
                'array',
            ],
            'category.*.id' => [
                'integer',
                'exists:content_categories,id',
            ],
            'tag' => [
                'array',
            ],
            'tag.*.id' => [
                'integer',
                'exists:content_tags,id',
            ],
            'contentPage.page_text' => [
                'string',
                'nullable',
            ],
            'contentPage.excerpt' => [
                'string',
                'nullable',
            ],
            'mediaCollections.content_page_featured_image' => [
                'array',
                'nullable',
            ],
            'mediaCollections.content_page_featured_image.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['category'] = ContentCategory::pluck('name', 'id');
        $this->listsForFields['tag']      = ContentTag::pluck('name', 'id');
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->contentPage->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
