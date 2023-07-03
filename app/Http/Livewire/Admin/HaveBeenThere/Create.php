<?php

namespace App\Http\Livewire\Admin\HaveBeenThere;

use App\Models\HaveBeenThere;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Create extends Component
{
    use WithMedia;

    public HaveBeenThere $havebeenthere;

    public array $listsForFields = [];

    public $mediaComponentNames = ['photos', 'tracks'];

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
                'required',
            ],
            'havebeenthere.report_id' => [
                'numeric',
                'required',
            ],
            'havebeenthere.date' => [
                'string',
                'required',
            ],

            'havebeenthere.title' => [
                'string',
                'required',
            ],
            'havebeenthere.slug' => [
                'string',
                'required',
            ],
            'havebeenthere.time_a' => [
                'string',
                'sometimes|nullable',
            ],
            'havebeenthere.time_r' => [
                'string',
                'sometimes|nullable',
            ],
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
}
