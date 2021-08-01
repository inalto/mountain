<?php

namespace App\Http\Livewire\Report;

use App\Models\Category;
use App\Models\Report;
use App\Models\Tag;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    public Report $report;

    public array $tags = [];

    public array $categories = [];

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public function mount(Report $report)
    {
        $this->report = $report;
        $this->initListsForFields();
    }

    public function render()
    {
        return view('livewire.report.create');
    }

    public function submit()
    {
        $this->validate();

        $this->report->save();
        $this->report->tags()->sync($this->tags);
        $this->report->categories()->sync($this->categories);
        $this->syncMedia();

        return redirect()->route('admin.reports.index');
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

    protected function rules(): array
    {
        return [
            'report.title' => [
                'string',
                'required',
            ],
            'report.slug' => [
                'string',
                'nullable',
            ],
            'report.difficulty' => [
                'nullable',
                'in:' . implode(',', array_keys($this->listsForFields['difficulty'])),
            ],
            'report.excerpt' => [
                'string',
                'nullable',
            ],
            'report.content' => [
                'string',
                'nullable',
            ],
            'mediaCollections.report_photo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.report_photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.report_tracks' => [
                'array',
                'nullable',
            ],
            'mediaCollections.report_tracks.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'tags' => [
                'array',
            ],
            'tags.*.id' => [
                'integer',
                'exists:tags,id',
            ],
            'categories' => [
                'array',
            ],
            'categories.*.id' => [
                'integer',
                'exists:categories,id',
            ],
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['difficulty'] = $this->report::DIFFICULTY_SELECT;
        $this->listsForFields['tags']       = Tag::pluck('name', 'id')->toArray();
        $this->listsForFields['categories'] = Category::pluck('name', 'id')->toArray();
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->report->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
