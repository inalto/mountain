<?php

namespace App\Http\Livewire\Poi;

use App\Models\Poi;
use App\Models\PoiTranslation;
use Livewire\Component;
use Cviebrock\EloquentSluggable\Services\SlugService;


class Edit extends Component
{
    public Poi $poi;

    public function mount(Poi $poi)
    {
        $this->poi = $poi;
    }

    public function render()
    {
        return view('livewire.poi.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->poi->save();

        return redirect()->route('admin.pois.index');
    }



    public function updatedPoiName()
    {
        $this->poi->translate('it')->slug = SlugService::createSlug(PoiTranslation::class, 'slug', $this->poi->name);
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
