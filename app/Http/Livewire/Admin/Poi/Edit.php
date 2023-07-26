<?php

namespace App\Http\Livewire\Admin\Poi;

use App\Models\Poi;
use App\Models\PoiTranslation;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use GuzzleHttp\Client;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Edit extends Component
{
    use WithMedia;

    public Poi $poi;

    public array $tags = [];

    public array $listsForFields = [];

    public $mediaComponentNames = ['photos'];


    public function mount(Poi $poi)
    {
        $this->poi = $poi;

        ray($this->poi);
        $location = [];
        $location['lat'] = 45.747297;
        $location['lon'] = 7.655518;

        $this->poi->location = $location;

        $this->initListsForFields();
        $this->tags = $this->poi->tags()->pluck('id')->toArray();
    }

    public function render()
    {
        return view('livewire.admin.poi.edit');
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
        $this->poi->tags()->sync($this->tags);



        $this->poi->syncFromMediaLibraryRequest($this->photos)->withCustomProperties('title', 'author')->toMediaCollection('poi_photos');

        $this->poi->save();
    }

    public function getHeight()
    {
        $client = new Client();
        //get elevation from bing maps

        $res = $client->request('GET', 'http://dev.virtualearth.net/REST/v1/Elevation/List?points='.$this->poi->location['lat'].','.$this->poi->location['lon'].'&key='.env('BING_MAP_API'), []);

        if ($res->getStatusCode() == 200) {
            $body = json_decode($res->getBody());
            $this->poi->height = $body->resourceSets[0]->resources[0]->elevations[0];
        }
        //  ray($res->getBody()->getContents());
        //$this->poi->height = "10";
    }

    public function updatedPoiName()
    {
        $this->poi->translate('it')->slug = SlugService::createSlug(PoiTranslation::class, 'slug', $this->poi->name);
    }

    protected function rules(): array
    {
        return [
            'poi.created_at' => [
                'string',
                'nullable',
            ],
            'poi.last_survey' => [
                'string',
                'nullable',
            ],
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

    protected function syncMedia(): void
    {
        collect($this->photos)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->poi->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
