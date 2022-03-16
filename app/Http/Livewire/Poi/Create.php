<?php

namespace App\Http\Livewire\InaltoPoi;

use App\Models\InaltoPoi as Poi;
use App\Models\InaltoPoiTranslation as PoiTranslation;
use App\Models\InaltoCategory;
use App\Models\Tag;

use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Create extends Component
{
    public Poi $poi;

    public function mount(Poi $poi)
    {
        /*if (!isset($poi)) { $this->poi = new Poi();} 
        else {*/
        $this->poi = $poi;
        //}
    }

    public function updatedPoiName()
    {
        $this->poi->translate('it')->slug = SlugService::createSlug(PoiTranslation::class, 'slug', $this->poi->name);
    }


    public function render()
    {
        return view('livewire.poi.create');
    }

    public function submit()
    {
        $this->validate();

        $this->poi->save();

        return redirect()->route('admin.pois.index');
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
        ];
    }
}
