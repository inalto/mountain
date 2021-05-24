<?php

namespace App\Http\Livewire\Poi;

use App\Models\Poi;
use Livewire\Component;

class Create extends Component
{
    public Poi $poi;

    public function mount(Poi $poi)
    {
        $this->poi = $poi;
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
            'poi.lat' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'poi.lon' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'poi.height' => [
                'string',
                'nullable',
            ],
            'poi.access' => [
                'string',
                'nullable',
            ],
            'poi.description' => [
                'string',
                'nullable',
            ],
            'poi.biography' => [
                'string',
                'nullable',
            ],
        ];
    }
}
