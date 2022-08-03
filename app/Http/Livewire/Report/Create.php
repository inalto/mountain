<?php

namespace App\Http\Livewire\Report;

use App\Models\Category;
use App\Models\Report;
use App\Models\ReportTranslation;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Create extends Component
{
    use WithFileUploads;

    public Report $report;

    public array $tags = [];

    public array $categories = [];

    public array $mediaToRemove = [];

    public array $listsForFields = [];

    public array $mediaCollections = [];

    public $type = '';

    public $difficulty = '';

    public $title = null;

    public $slug = null;

    public function mount(Report $report)
    {
        $this->report = $report;
        $this->initListsForFields();
    }

    public function render()
    {
        ray($this->mediaCollections);

        return view('livewire.report.create');
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
        $this->validate();

        $this->report->save();
        $this->report->tags()->sync($this->tags);
        $this->report->categories()->sync($this->categories);
        $this->syncMedia();

        return redirect()->route('admin.reports.index');
    }

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

    protected function rules(): array
    {
        return [
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
            'mediaCollections.report_photo' => [
                'array',
                'nullable',
            ],
            'mediaCollections.report_photo.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'mediaCollections.report_tracks' => [
                'array',
                'nullable',
            ],
            'mediaCollections.report_tracks.*.id' => [
                'integer',
                'exists:media,id',
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

        //       $this->listsForFields['difficulty'] = $this->report::DIFFICULTY_SELECT;
        $this->listsForFields['tags'] = Tag::pluck('name', 'id')->toArray();
        $this->listsForFields['categories'] = Category::pluck('name', 'id')->toArray();
    }

    protected function syncMedia(): void
    {
        collect($this->mediaCollections)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->report->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
