<?php

namespace App\Http\Livewire\Admin\Report;

use App\Models\Category;
use App\Models\HaveBeenThere;
use App\Models\Report;
use App\Models\ReportTranslation;
use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Create extends Component
{
    use WithMedia;

    protected $listeners = ['delete', 'save', 'userSelected'];

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

    public $difficulty = '';

    public $difficulties = [];

    public $title = null;

//    public $exposure = null;

    public $slug = null;

    public $parent_id = null;

    public function mount(Report $report)
    {
        ray($report);
        $this->report = $report;
        $this->report->period=[];
        $this->difficulty = $report->difficulty;
        if (! $report->category_id) {
            $report->category_id = Category::query()->first()->id;
        }
        //   $this->initListsForFields();
        $this->difficulties = $this->report->getDifficulties();

        //$this->tags = $this->report->tags()->pluck('id')->toArray();
        $this->tags = $this->report->tags()->pluck('id')->toArray();
        $this->categories = Category::query()->get()->pluck('name', 'id')->toArray();

//        $this->photos= $this->report->getMedia('report_photos');

        if (is_array($this->report->bibliographies)) {
            $this->bibliographies = $this->report->bibliographies;
        }
    }

    public function render()
    {
        return view('livewire.admin.report.edit');
    }

    public function userSelected($id)
    {
        $this->report->owner_id = $id;
    }

    public function updatedReportTitle()
    {
        $this->report->slug = SlugService::createSlug(ReportTranslation::class, 'slug', $this->report->title);
    }

    public function updatedReportCategoryId()
    {
        $this->difficulties = $this->report->getDifficulties();
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

        $this->report->time_a = Carbon::parse($this->report->time_a)->format('H:i');
        $this->report->time_r = Carbon::parse($this->report->time_r)->format('H:i');

        unset($this->report->parent_id);
        $this->report->save();

        //$this->report->addFromMediaLibraryRequest($this->photos)->toMediaCollection('report_photos');
        //$this->report->addFromMediaLibraryRequest($this->tracks)->toMediaCollection('report_tracks');
        $this->report->syncFromMediaLibraryRequest($this->photos)->withCustomProperties('title', 'author')->toMediaCollection('report_photos');
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

            foreach ($this->report->getMedia('report_photos') as $photo) {
                $photo->copy($hbt, 'havebeenthere_photos');
            }

            foreach ($this->report->getMedia('report_tracks') as $track) {
                $track->copy($hbt, 'havebeenthere_photos');
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
                'string',

                /*
                'in:' . implode(',', array_keys(array_merge(
                    $this->listsForFields['hiking'],
                    $this->listsForFields['snowshoeing'],
                    $this->listsForFields['mountaineering'],
                    $this->listsForFields['skimountaineering']
                ))),
*/
            ],
            'report.period' => [
                'array',
                'nullable',
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
            'report.category_id' => [
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
            'message' => 'Report deleted',
        ]);
    }
}
