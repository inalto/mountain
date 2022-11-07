<?php

namespace App\Http\Livewire\HaveBeenThere;

use App\Models\HaveBeenThere;



use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;
use GuzzleHttp\Client;

class Edit extends Component
{
    use WithMedia;
    public HaveBeenThere $havebeenthere;


    public array $listsForFields = [];
    public $type = '';
    public $mediaComponentNames = ['photos','tracks'];
    public $photos;
    public $tracks;

    public $difficulty = '';

    public $title = null;

    public $slug = null;

    public function mount(HaveBeenThere $havebeenthere)
    {
        
        $this->havebeenthere = $havebeenthere;
        $this->difficulty = $havebeenthere->difficulty;

        $this->initListsForFields();

    }

    public function render()
    {
        return view('livewire.have-been-there.edit');
    }


    public function updatedHavebeenthereTitle()
    {
        $this->havebeenthere->slug = SlugService::createSlug(HaveBeenThere::class,'slug',$this->havebeenthere->title);
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


    public function getHeight()
    {
        $client = new Client();
        //get elevation from bing maps
        
        $res = $client->request('GET', 'http://dev.virtualearth.net/REST/v1/Elevation/List?points='.$this->havebeenthere->location['lat'].','.$this->havebeenthere->location['lon'].'&key='.env('BING_MAP_API'), []);

        if($res->getStatusCode()==200)
        {
            $body = json_decode($res->getBody());
            $this->havebeenthere->height = $body->resourceSets[0]->resources[0]->elevations[0];
        }
      //  ray($res->getBody()->getContents());
        //$this->havebeenthere->height = "10";
    }


    public function updatedHaveBeenThereName()
    {
        $this->havebeenthere->slug = SlugService::createSlug(HaveBeenThereTranslation::class, 'slug', $this->havebeenthere->title);
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

    
    protected function initListsForFields(): void
    {
        $this->listsForFields['type'] = [
            'hiking' => trans('cruds.report.fields.difficulty_class.hiking'),
            'snowshoeing' => trans('cruds.report.fields.difficulty_class.snowshoeing'),
            'mountaineering' => trans('cruds.report.fields.difficulty_class.mountaineering'),
            'skimountaineering' => trans('cruds.report.fields.difficulty_class.skimountaineering'),
        ];

        $this->listsForFields['hiking'] = [
            'T1' => trans('cruds.report.fields.difficulty_class.T1'),
            'T2' => trans('cruds.report.fields.difficulty_class.T2'),
            'T3' => trans('cruds.report.fields.difficulty_class.T3'),
            'T4' => trans('cruds.report.fields.difficulty_class.T4'),
            'T5' => trans('cruds.report.fields.difficulty_class.T5'),
        ];
        $this->listsForFields['snowshoeing'] = [
            'WT1' => trans('cruds.report.fields.difficulty_class.WT1'),
            'WT2' => trans('cruds.report.fields.difficulty_class.WT2'),
            'WT3' => trans('cruds.report.fields.difficulty_class.WT3'),
            'WT4' => trans('cruds.report.fields.difficulty_class.WT4'),
            'WT5' => trans('cruds.report.fields.difficulty_class.WT5'),
        ];
        $this->listsForFields['mountaineering'] = [
            'F-' => trans('cruds.report.fields.difficulty_class.Fm'),
            'F' => trans('cruds.report.fields.difficulty_class.F'),
            'F+' => trans('cruds.report.fields.difficulty_class.Fp'),
            'PD-' => trans('cruds.report.fields.difficulty_class.PDm'),
            'PD' => trans('cruds.report.fields.difficulty_class.PD'),
            'PD+' => trans('cruds.report.fields.difficulty_class.PDp'),
            'AD-' => trans('cruds.report.fields.difficulty_class.ADm'),
            'AD' => trans('cruds.report.fields.difficulty_class.AD'),
            'AD+' => trans('cruds.report.fields.difficulty_class.ADp'),
            'D-' => trans('cruds.report.fields.difficulty_class.Dm'),
            'D' => trans('cruds.report.fields.difficulty_class.D'),
            'D+' => trans('cruds.report.fields.difficulty_class.Dp'),
            'TD-' => trans('cruds.report.fields.difficulty_class.TDm'),
            'TD' => trans('cruds.report.fields.difficulty_class.TD'),
            'TD+' => trans('cruds.report.fields.difficulty_class.TDp'),
            'ED-' => trans('cruds.report.fields.difficulty_class.EDm'),
            'ED' => trans('cruds.report.fields.difficulty_class.ED'),
            'ED+' => trans('cruds.report.fields.difficulty_class.EDp'),
        ];
        $this->listsForFields['skimountaineering'] = [
            'MS' => trans('cruds.report.fields.difficulty_class.MS'),
            'MSA' => trans('cruds.report.fields.difficulty_class.MSA'),
            'BS' => trans('cruds.report.fields.difficulty_class.BS'),
            'BSA' => trans('cruds.report.fields.difficulty_class.BSA'),
            'OS' => trans('cruds.report.fields.difficulty_class.OS'),
            'OSA' => trans('cruds.report.fields.difficulty_class.OSA'),
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
