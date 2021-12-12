<?php

namespace App\Http\Livewire\Report;

use App\Models\Category;
use App\Models\Report;
use App\Models\ReportTranslation;
use App\Models\Tag;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;
use Cviebrock\EloquentSluggable\Services\SlugService;

class Edit extends Component
{
    use WithMedia;

    public Report $report;

    public array $tags = [];

    public array $categories = [];

    public array $mediaToRemove = [];

    public array $listsForFields = [];

 //   public array $mediaCollections = [];

    public $mediaComponentNames = ['photos'];

    public $photos;

    public array $bibliographies = [];

    public $type ="";
    public $difficulty ="";

    public $title = null;
    public $slug = null;




    public function mount(Report $report)
    {
 
        
        $this->report     = $report;
        $this->difficulty     = $report->difficulty;
        $this->initListsForFields();
        $this->type = $this->report->getTypeAttribute();
        $this->tags       = $this->report->tags()->pluck('id')->toArray();
        $this->categories = $this->report->categories()->pluck('id')->toArray();
        
    //    dd($report->getMedia('report_photos'));
       // $this->photos =$report->getMedia('photos');
   //  dd($this);
        //$this->report->bibliographies ?? [];
        //$this->bibliographies = $this->report->bibliographies?$this->report->bibliographies:[];
        $this->bibliographies ?? [];
        //$this->report_photos = $report->photos;
 /*
        $this->mediaCollections = [
            'report_photos'  => $report->photos,
            'report_tracks' => $report->tracks,
        ];

        */
    }

    public function render()
    {
        //ray($this);
        //$this->initListsForFields();
        return view('livewire.report.edit');
    }
    
    public function updatedReportTitle()
    {
        $this->report->slug = SlugService::createSlug(ReportTranslation::class, 'slug', $this->report->title);
    }
    public function updatedType($type)
    {
        $this->type=$type;
        //ray($this->type);
        $this->difficulty = key($this->listsForFields[$type]);
    }

    public function submit()
    {
        $this->validate();
        $this->report->bibliographies=$this->bibliographies?$this->bibliographies:[];
        $this->report->save();
        $this->report->addFromMediaLibraryRequest($this->photos)->toMediaCollection('report_photos');
        $this->report->tags()->sync($this->tags);
        $this->report->categories()->sync($this->categories);
        
   //     $this->syncMedia();

        ray(json_encode($this->bibliographies));

        return redirect()->route('admin.reports.index');
    }
/*
    public function addMedia($media): void
    {
        $this->mediaCollections[$media['collection_name']][] = $media;
    }

    public function removeMedia($media): void
    {
        $collection = collect($this->mediaCollections[$media['collection_name']]);

        $this->mediaCollections[$media['collection_name']] = $collection->reject(fn ($item) => $item['uuid'] === $media['uuid'])->toArray();

        $this->mediaToRemove[] = $media['uuid'];
    }

    public function getMediaCollection($name)
    {
        return $this->mediaCollections[$name];
    }

*/

    protected function rules(): array
    {
        return [
            'photos.*.name' => [
                'string',
                'required'
            ],

            'report'=>[
                'array',
            ],
            'type' => [
                'string',
                'nullable',
            ],
            'report.title' => [
                'string',
                'required',
            ],
            'report.slug' => [
                'string',
                'nullable',
            ],

            'report.drop_p' => [
                'digits_between:0,4',
                'nullable',
            ],
            'report.drop_n' => [
                'digits_between:0,4',
                'nullable',
            ],
            'report.altitude_s' => [
                'digits_between:0,4',
                'nullable',
            ],
            'report.altitude_e' => [
                'digits_between:0,4',
                'nullable',
            ],
            'report.length' => [
                'digits_between:0,4',
                'nullable',
            ],
     

            
            'report.difficulty' => [
                'nullable',
                /*'string',*/
                
                'in:' . implode(',', array_keys(array_merge(
                    $this->listsForFields['hiking'],
                    $this->listsForFields['snowshoeing'],
                    $this->listsForFields['mountaineering'],
                    $this->listsForFields['skimountaineering']
                ))),
                
            ],
            'report.approved' => [
                'boolean',
                'nullable',
            ],
            'report.published' => [
                'boolean',
                'nullable',
            ],
            'report.excerpt' => [
                'string',
                'nullable',
            ],
            'report.content' => [
                'string',
                'nullable',
            ],

            'tags' => [
                'array',
            ],
            'tags.*.id' => [
                'integer',
                'exists:tags,id',
            ],
            'categories' => [
                'array',
            ],
            'categories.*.id' => [
                'integer',
                'exists:categories,id',
            ],
            'bibliographies' => [
                'array',
            ],

          
        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['type'] = [
            'hiking' => trans('cruds.report.fields.difficulty_class.hiking'),
            'snowshoeing' => trans('cruds.report.fields.difficulty_class.snowshoeing'),
            'mountaineering' => trans('cruds.report.fields.difficulty_class.mountaineering'),
            'skimountaineering' => trans('cruds.report.fields.difficulty_class.skimountaineering')
        ];

        $this->listsForFields['hiking'] = [
            'T1' => trans('cruds.report.fields.difficulty_class.T1'),
            'T2' => trans('cruds.report.fields.difficulty_class.T2'),
            'T3' => trans('cruds.report.fields.difficulty_class.T3'),
            'T4' => trans('cruds.report.fields.difficulty_class.T4'),
            'T5' => trans('cruds.report.fields.difficulty_class.T5')
        ];
        $this->listsForFields['snowshoeing'] = [
            'WT1'=>trans('cruds.report.fields.difficulty_class.WT1'),
            'WT2'=>trans('cruds.report.fields.difficulty_class.WT2'),
            'WT3'=>trans('cruds.report.fields.difficulty_class.WT3'),
            'WT4'=>trans('cruds.report.fields.difficulty_class.WT4'),
            'WT5'=>trans('cruds.report.fields.difficulty_class.WT5')
        ];
        $this->listsForFields['mountaineering'] = [
            'F-'=>trans('cruds.report.fields.difficulty_class.Fm'),
            'F'=>trans('cruds.report.fields.difficulty_class.F'),
            'F+'=>trans('cruds.report.fields.difficulty_class.Fp'),
            'PD-'=>trans('cruds.report.fields.difficulty_class.PDm'),
            'PD'=>trans('cruds.report.fields.difficulty_class.PD'),
            'PD+'=>trans('cruds.report.fields.difficulty_class.PDp'),
            'AD-'=>trans('cruds.report.fields.difficulty_class.ADm'),
            'AD'=>trans('cruds.report.fields.difficulty_class.AD'),
            'AD+'=>trans('cruds.report.fields.difficulty_class.ADp'),
            'D-'=>trans('cruds.report.fields.difficulty_class.Dm'),
            'D'=>trans('cruds.report.fields.difficulty_class.D'),
            'D+'=>trans('cruds.report.fields.difficulty_class.Dp'),
            'TD-'=>trans('cruds.report.fields.difficulty_class.TDm'),
            'TD'=>trans('cruds.report.fields.difficulty_class.TD'),
            'TD+'=>trans('cruds.report.fields.difficulty_class.TDp'),
            'ED-'=>trans('cruds.report.fields.difficulty_class.EDm'),
            'ED'=>trans('cruds.report.fields.difficulty_class.ED'),
            'ED+'=>trans('cruds.report.fields.difficulty_class.EDp'),
        ];
        $this->listsForFields['skimountaineering'] = [
            'MS'=>trans('cruds.report.fields.difficulty_class.MS'),
            'MSA'=>trans('cruds.report.fields.difficulty_class.MSA'),
            'BS'=>trans('cruds.report.fields.difficulty_class.BS'),
            'BSA'=>trans('cruds.report.fields.difficulty_class.BSA'),
            'OS'=>trans('cruds.report.fields.difficulty_class.OS'),
            'OSA'=>trans('cruds.report.fields.difficulty_class.OSA')
        ];

 //       $this->listsForFields['difficulty'] = $this->report::DIFFICULTY_SELECT;
        $this->listsForFields['tags']       = Tag::pluck('name', 'id')->toArray();
        $this->listsForFields['categories'] = Category::pluck('name', 'id')->toArray();
    }

    protected function syncMedia(): void
    {
        collect($this->photos)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->report->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
