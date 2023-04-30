<?php

namespace App\Http\Livewire\Admin\Poi;

use App\Models\Poi as Poi;
use App\Models\Tag;
use App\Models\Translation as PoiTranslation;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Create extends Component
{
    use WithMedia;

    public Poi $poi;

    public array $tags = [];

    public array $listsForFields = [];

    public $mediaComponentNames = ['photos'];

    public $photos;

    public function mount(Poi $poi)
    {
        /*if (!isset($poi)) { $this->poi = new Poi();}
        else {*/
        $this->poi = $poi;
        $this->initListsForFields();

        $this->tags = $this->poi->tags()->pluck('id')->toArray();

        //}
    }

    public function updatedPoiName()
    {
        $this->poi->translate('it')->slug = SlugService::createSlug(PoiTranslation::class, 'slug', $this->poi->name);
    }

    public function render()
    {
        return view('livewire.admin.poi.create');
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['tags'] = Tag::pluck('name', 'id')->toArray();
    }

    public function submit()
    {
        $this->save();

        return redirect()->route('admin.pois.index');
    }

    public function save()
    {
        $this->report->tags()->sync($this->tags);

        $this->poi->syncFromMediaLibraryRequest($this->photos)->toMediaCollection('poi_photos');

        $this->poi->save();
    }

    protected function rules(): array
    {
        return [
            'poi.name' => [
                'string',
                'nullable',
            ],
            'poi.slug' => [
                'string',
                'nullable',
            ],
            'poi.location.lat' => 'numeric|between:-90,90',
            'poi.location.lon' => 'numeric|between:-180,180',

            'poi.height' => [
                'digits_between:0,4',
                'nullable',
            ],
            'poi.approved' => [
                'boolean',
                'nullable',
            ],
            'poi.published' => [
                'boolean',
                'nullable',
            ],
            'poi.excerpt' => [
                'string',
                'nullable',
            ],
            'poi.content' => [
                'string',
                'nullable',
            ],
            'poi.bibliography' => [
                'string',
                'nullable',
            ],
            'photos.*.name' => [
                'string',
                'required',
            ],

            'tags' => [
                'array',
            ],
            'tags.*.id' => [
                'integer',
                'exists:tags,id',
            ],

        ];
    }
}
