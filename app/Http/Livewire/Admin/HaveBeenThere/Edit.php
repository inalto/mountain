<?php

namespace App\Http\Livewire\Admin\HaveBeenThere;

use App\Models\HaveBeenThere;
use Cviebrock\EloquentSluggable\Services\SlugService;
use GuzzleHttp\Client;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Edit extends Component
{
    use WithMedia;

    public HaveBeenThere $havebeenthere;

    protected $listeners = ['reportSelected', 'userSelected'];

    public array $listsForFields = [];

    public $type = '';

    public $mediaComponentNames = ['photos', 'tracks'];

    public $photos;

    public $tracks;

    public $difficulty = '';

    public $title = null;

    public $slug = null;

    public function mount(HaveBeenThere $havebeenthere)
    {
        $this->havebeenthere = $havebeenthere;
   //     $this->difficulty = $havebeenthere->difficulty;
    }

    public function render()
    {
        return view('livewire.admin.have-been-there.edit');
    }

    public function updatedHavebeenthereTitle()
    {
        $this->havebeenthere->slug = SlugService::createSlug(HaveBeenThere::class, 'slug', $this->havebeenthere->title);
    }

    public function userSelected($id)
    {
        $this->havebeenthere->owner_id = $id;
    }

    public function reportSelected($id)
    {
        $this->havebeenthere->report_id = $id;
    }

    public function submit()
    {
        $this->save();

        return redirect()->route('admin.have-been-there.index');
    }

    public function save()
    {
        $this->havebeenthere->syncFromMediaLibraryRequest($this->photos)->withCustomProperties('title', 'author')->toMediaCollection('havebeenthere_photos');

        $this->havebeenthere->save();
    }

    public function getHeight()
    {
        $client = new Client();
        //get elevation from bing maps

        $res = $client->request('GET', 'http://dev.virtualearth.net/REST/v1/Elevation/List?points='.$this->havebeenthere->location['lat'].','.$this->havebeenthere->location['lon'].'&key='.env('BING_MAP_API'), []);

        if ($res->getStatusCode() == 200) {
            $body = json_decode($res->getBody());
            $this->havebeenthere->height = $body->resourceSets[0]->resources[0]->elevations[0];
        }
        //  ray($res->getBody()->getContents());
        //$this->havebeenthere->height = "10";
    }

    protected function rules(): array
    {
        return [
            'havebeenthere.owner_id' => [
                'integer',
                'nullable',
            ],
            'havebeenthere.report_id' => [
                'integer',
                'nullable',
            ],
            'havebeenthere.date' => [
                'datetime',
                'nullable',
            ],
            'havebeenthere.updated_at' => [
                'datetime',
                'nullable',
            ],

            'havebeenthere.title' => [
                'string',
                'nullable',
            ],
            'havebeenthere.slug' => [
                'string',
                'nullable',
            ],
            'havebeenthere.time_a' => [
                'string',
                'nullable',
            ],
            'havebeenthere.time_r' => [
                'string',
                'nullable',
            ],
            'havebeenthere.location.lat' => 'numeric|between:-90,90',
            'havebeenthere.location.lon' => 'numeric|between:-180,180',
            'havebeenthere.approved' => [
                'boolean',
                'nullable',
            ],
            'havebeenthere.published' => [
                'boolean',
                'nullable',
            ],
            'havebeenthere.content' => [
                'string',
                'nullable',
            ],
            'photos.*.name' => [
                'string',
                'required',
            ],
        ];
    }

    protected function syncMedia(): void
    {
        collect($this->photos)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->havebeenthere->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
