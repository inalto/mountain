<?php

namespace App\Http\Livewire\Admin\NewsPost;

use App\Models\NewsPost;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public NewsPost $Newspost;

    public array $mediaToRemove = [];

    public array $mediaCollections = [];

    public function mount(NewsPost $Newspost)
    {
        $this->Newspost = $Newspost;
        $this->mediaCollections = [
            'Newspost_photo' => $Newspost->photo,
        ];
    }

    public function render()
    {
        return view('livewire.admin.news-post.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->Newspost->save();
        $this->syncMedia();

        return redirect()->route('admin.Newsposts.index');
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
            'Newspost.title' => [
                'string',
                'nullable',
            ],
            'Newspost.slug' => [
                'string',
                'nullable',
            ],
            'Newspost.excerpt' => [
                'string',
                'nullable',
            ],
            'Newspost.content' => [
                'string',
                'nullable',
            ],
            'mediaCollections.Newspost_photo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.Newspost_photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->Newspost->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
