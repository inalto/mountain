<?php

namespace App\Http\Livewire\HaveBeenThere;

use App\Models\HaveBeenThere as HaveBeenThere;




use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Create extends Component
{
    use WithMedia;
    public HaveBeenThere $havebeenthere;

    public array $listsForFields = [];

    public $mediaComponentNames = ['photos','tracks'];
    public $photos;

    public function mount(HaveBeenThere $havebeenthere)
    {
        $this->havebeenthere = $havebeenthere;
    }

    public function updatedHaveBeenThereName()
    {
        $this->havebeenthere->translate('it')->slug = SlugService::createSlug(HaveBeenThereTranslation::class, 'slug', $this->havebeenthere->name);
    }

    public function render()
    {
        return view('livewire.have-been-there.create');
    }

    public function submit()
    {

        $this->save();
        return redirect()->route('admin.have-been-there.index');
    }
    public function save()
    {


        $this->havebeenthere->syncFromMediaLibraryRequest($this->photos)->toMediaCollection('havebeenthere_photos');
        
        $this->havebeenthere->save();
    }

    protected function rules(): array
    {
        return [
            'havebeenthere.name' => [
                'string',
                'nullable',
            ],
            'havebeenthere.slug' => [
                'string',
                'nullable',
            ],
            'havebeenthere.location.lat' => 'numeric|between:-90,90',
            'havebeenthere.location.lon' => 'numeric|between:-180,180',

            'havebeenthere.height' => [
                'digits_between:0,4',
                'nullable',
            ],
            'havebeenthere.approved' => [
                'boolean',
                'nullable',
            ],
            'havebeenthere.published' => [
                'boolean',
                'nullable',
            ],
            'havebeenthere.excerpt' => [
                'string',
                'nullable',
            ],
            'havebeenthere.content' => [
                'string',
                'nullable',
            ],
            'havebeenthere.bibliography' => [
                'string',
                'nullable',
            ],
            'photos.*.name' => [
                'string',
                'required',
            ]

        ];
    }
}
