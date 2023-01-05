<?php

namespace App\Http\Livewire\Admin\Report;

use App\Models\Category;
use App\Models\Report;
use App\Models\ReportTranslation;
use Spatie\Tags\Tag;

use Cviebrock\EloquentSluggable\Services\SlugService;
use Input;
use Livewire\Component;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Create extends Component
{
    use WithMedia;

    public Report $report;

    public array $tags = [];

    public array $categories = [];

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    // public array $mediaCollections = [];
    public $mediaComponentNames = ['photos', 'tracks'];

    public $photos;

    public $tracks;

    public array $bibliographies = [];

    public $type = '';

    public $difficulty = '';

    public $title = null;

    public $slug = null;

    public function mount()
    {
        $report = new Report();
        
        $this->report = $report;
        $this->initListsForFields();
        /*
        $this->difficulty = $report->difficulty;
        
        $this->type = $this->report->getTypeAttribute();
        $this->tags = $this->report->tags()->pluck('id')->toArray();
        //$this->categories = $this->report->categories()->pluck('id')->toArray();
        $this->categories = $this->report->categories()->pluck('id')->toArray();

        // $this->photos =$report->getMedia('photos');

        if (is_array($this->report->bibliographies)) {
            $this->bibliographies = $this->report->bibliographies;
        }
        */
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
        return view('livewire.admin.report.create');
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
        $this->report->save();

        $this->report->bibliographies = $this->bibliographies;

        $this->report->addFromMediaLibraryRequest($this->photos)->toMediaCollection('report_photos');
        $this->report->addFromMediaLibraryRequest($this->tracks)->toMediaCollection('report_tracks');

        //$this->report->syncFromMediaLibraryRequest($this->photos)->toMediaCollection('report_photos');
        //$this->report->syncFromMediaLibraryRequest($this->tracks)->toMediaCollection('report_tracks');

        $this->report->tags()->sync($this->tags);
        $this->report->categories()->sync($this->categories);
        //unset($this->report->categories);
        $this->report->save();
    }


    public function addBibliography()
    {
        $this->bibliographies[] = ['title' => '', 'author' => '', 'publisher'=>'','link' => 'https://'];
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

                'in:'.implode(',', array_keys(array_merge(
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
            'report.updated_at' => [

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
}
