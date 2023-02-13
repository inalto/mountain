<?php

namespace App\Http\Livewire\Admin\Report;

use App\Models\Category;
use App\Models\Report;
use App\Models\HaveBeenThere;
use App\Models\ReportTranslation;
use App\Models\Tag;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Input;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;
use Request;

class Edit extends Component
{
    use WithMedia;

    protected $listeners = ['delete','save'];


    public Report $report;

    public array $tags = [];

    public array $categories = [];

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    //  public array $mediaCollections = [];



    public $mediaComponentNames = ['photos', 'tracks'];

    public $photos;

    public $tracks;

    public array $bibliographies = [];

    public $type = '';

    public $difficulty = '';

    public $title = null;

//    public $exposure = null;

    public $slug = null;

    public $parent_id = null;

    public function mount(Report $report)
    {
        $this->report = $report;
        $this->difficulty = $report->difficulty;
        $this->initListsForFields();
        $this->type = $this->report->getTypeAttribute();
        $this->tags = $this->report->tags()->pluck('id')->toArray();
        $this->categories = $this->report->categories()->pluck('id')->toArray();


//        $this->photos= $this->report->getMedia('report_photos');

        if (is_array($this->report->bibliographies)) {
            $this->bibliographies = $this->report->bibliographies;
        }
    }

    public function render()
    {
        return view('livewire.admin.report.edit');
    }

    public function updatedReportTitle()
    {
        $this->report->slug = SlugService::createSlug(ReportTranslation::class, 'slug', $this->report->title);
    }

    public function updatedType($type)
    {
        $this->type = $type;
        //ray($this->type);
        $this->difficulty = key($this->listsForFields[$type]);
    }

    public function submit()
    {

        $this->save();
        return redirect()->route('admin.reports.index');
    }
    public function save()
    {
     
        $this->report->bibliographies = $this->bibliographies;
        $this->report->tags()->sync($this->tags);
        $this->report->categories()->sync($this->categories);
        unset($this->report->categories);
        unset($this->report->parent_id);
        $this->report->save();
        ray($this->report);
        //$this->report->addFromMediaLibraryRequest($this->photos)->toMediaCollection('report_photos');
        //$this->report->addFromMediaLibraryRequest($this->tracks)->toMediaCollection('report_tracks');
        $this->report->syncFromMediaLibraryRequest($this->photos)->withCustomProperties('title','author')->toMediaCollection('report_photos');
        $this->report->syncFromMediaLibraryRequest($this->tracks)->toMediaCollection('report_tracks');

        $this->dispatchBrowserEvent('toastr:success', ['message' => trans('cruds.report.toastr.saved')]);
    }

    public function convert()
    {

        if ($this->parent_id) {

            $hbt = new HaveBeenThere();
            $hbt->title = $this->report->title;
            $hbt->slug = $this->report->slug;

            $hbt->difficulty = $this->difficulty;
            $hbt->content = $this->report->content;
            $hbt->created_at = $this->report->created_at;
            $hbt->updated_at = $this->report->updated_at;
            $hbt->date = $this->report->created_at;
            $hbt->report_id = $this->parent_id;
            $hbt->save();
            $hbt->owner_id = $this->report->owner_id;
            $hbt->save();
            //ray($hbt);

            foreach( $this->report->getMedia('report_photos') as $photo) {
                $photo->copy($hbt,'havebeenthere_photos');
            }
            
            foreach( $this->report->getMedia('report_tracks') as $track) {
                $track->copy($hbt,'havebeenthere_photos');
            }

            /*
            $hbt->syncFromMediaLibraryRequest($this->photos)->toMediaCollection('havebeenthere_photos');
            $hbt->syncFromMediaLibraryRequest($this->track)->toMediaCollection('havebeenthere_tracks');
            */
            
        //    $this->report->delete();
            $this->dispatchBrowserEvent('toastr:success', ['message' => trans('cruds.report.toastr.converted')]);
           return redirect()->route('admin.reports.index');

        }
    }

    public function addBibliography()
    {
        $this->bibliographies[] = ['title' => '', 'author' => '', 'link' => 'https://'];
    }

    public function removeBibliography($index)
    {
        array_splice($this->bibliographies, $index, 1);
    }



    protected function rules(): array
    {
        return [
            'report.owner_id' => [
                'digits_between:0,4',
                'required',

            ],
            'photos.*.name' => [
                'string',
                'required',
            ],
            'photos.*.custom_properties.title' => [
                'required',  
            ],
            'photos.*.custom_properties.author' => [
                'required',  
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
            'report.time_a' => [
                'string',
                'nullable',
            ],
            'report.time_r' => [
                'string',
                'nullable',
            ],

            'report.length' => [
                'numeric',
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
            'report.access' => [
                'string',
                'nullable',
            ],
            'report.updated_at' => [
                'nullable',
            ],
            'report.exposure' => [
                'string',
                'nullable',
            ],
            'report.parent_id' => [
                'numeric',
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
            'bibliographies.*.title' => [
                'string',
                'nullable',
            ],
            'bibliographies.*.publisher' => [
                'string',
                'nullable',
            ],
            'bibliographies.*.author' => [
                'string',
                'nullable',
            ],
            'bibliographies.*.link' => [
                'string',
                'nullable',
            ],

        ];
    }

    protected function initListsForFields(): void
    {
        $this->listsForFields['type'] = [
            'hiking' => trans('cruds.report.fields.difficulty_class.hiking'),
            'snowshoeing' => trans('cruds.report.fields.difficulty_class.snowshoeing'),
            'mountaineering' => trans('cruds.report.fields.difficulty_class.mountaineering'),
            'skimountaineering' => trans('cruds.report.fields.difficulty_class.skimountaineering'),
            'ferrata' => trans('cruds.report.fields.difficulty_class.ferrata'),
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
        $this->listsForFields['ferrata'] = [
            'F' => trans('cruds.report.fields.difficulty_class.F'),
            'PD' => trans('cruds.report.fields.difficulty_class.PD'),
            'D' => trans('cruds.report.fields.difficulty_class.D'),
            'MD' => trans('cruds.report.fields.difficulty_class.MD'),
            'ED' => trans('cruds.report.fields.difficulty_class.ED')
        ];

        //       $this->listsForFields['difficulty'] = $this->report::DIFFICULTY_SELECT;
        $this->listsForFields['tags'] = Tag::pluck('name', 'id')->toArray();
       //$this->listsForFields['tags']=[];
        $this->listsForFields['categories'] = Category::all()->map(function ($qry) {
            return $qry->translateOrDefault();
        })->pluck('name', 'id')->toArray();
    }

    protected function syncMedia(): void
    {
        collect($this->photos)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
                ->update(['model_id' => $this->report->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }

    public function deleteConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure? ',
            'text' => '',
            'id' => $this->report->id,
        ]);
    }

    public function delete($id)
    {
        Report::find($id)->delete();
        $this->dispatchBrowserEvent('toastr:error', [
            'message' => 'Report deleted'
        ]);
    }
}
