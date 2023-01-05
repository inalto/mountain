<?php

namespace App\Http\Livewire\Admin\HaveBeenThere;

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
        return view('livewire.admin.have-been-there.create');
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
            'havebeenthere.owner_id' => [
                'numeric',
                'nullable',
            ],
            'havebeenthere.report_id' => [
                'numeric',
                'nullable',
            ],
            'havebeenthere.date' => [
                'string',
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
            'report.time_a' => [
                'string',
                'nullable',
            ],
            'report.time_r' => [
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
            ]

        ];
    }
}
