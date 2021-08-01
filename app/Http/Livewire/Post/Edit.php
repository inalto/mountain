<?php

namespace App\Http\Livewire\Post;

use App\Models\Post;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Edit extends Component
{
    public Post $post;

    public array $mediaToRemove = [];

    public array $mediaCollections = [];

    public function mount(Post $post)
    {
        $this->post             = $post;
        $this->mediaCollections = [
            'post_photo' => $post->photo,
        ];
    }

    public function render()
    {
        return view('livewire.post.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->post->save();
        $this->syncMedia();

        return redirect()->route('admin.posts.index');
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
            'post.title' => [
                'string',
                'nullable',
            ],
            'post.slug' => [
                'string',
                'nullable',
            ],
            'post.excerpt' => [
                'string',
                'nullable',
            ],
            'post.content' => [
                'string',
                'nullable',
            ],
            'mediaCollections.post_photo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.post_photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->post->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
