<?php

namespace App\Http\Livewire\Frontend\HaveBeenThere;

use App\Models\HaveBeenThere as HaveBeenThereModel;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $category;

    public $tag;

    public $user_id;

    public $report_id;

    public $isModalOpen = 0;

    protected $listeners = ['hbtIndexRefresh' => '$refresh', 'parentModalClose' => 'modalClose'];

    private $havebeentheres;

    public HaveBeenThereModel $editing;

    protected $rules = [
        'editing.title' => 'required',
        'editing.content' => 'required',
        'editing.date' => 'required',
        'editing.time_a' => 'required',
        'editing.time_r' => 'required',
    ];

    //public $havebeentheres=[];

    public function mount($report_id = null, $category = null, $user = null, $tag = null)
    {
        $this->editing = new HaveBeenThereModel();

        $this->category = $category;
        $this->user_id = $user;
        $this->tag = $tag;
        $this->report_id = $report_id;
    }

    public function render()
    {
        if ($this->report_id) {
            $this->havebeentheres = HaveBeenThereModel::where('report_id', $this->report_id)->orderBy('date', 'desc');
        } elseif ($this->tag) {
            $tag = Tag::where('slug', $this->tag)->first();
            if ($tag) {
                $this->havebeentheres = HaveBeenThereModel::with(['owner', 'media', 'report'])->whereHas('tags', function ($query) use ($tag) {
                    $query->where('tags.id', $tag->id);
                })->orderByTranslation('title', 'asc');
            }
        } else {
            // try to load all the havebeentheres
            $this->havebeentheres = HaveBeenThereModel::with(['owner', 'media', 'report']);
        }
        if ($this->user_id) {
            $this->havebeentheres = $this->havebeentheres->where('owner_id', '=', $this->user_id);
        }

        $this->havebeentheres = $this->havebeentheres->orderBy('date', 'desc')->paginate(12);

        return view('livewire.frontend.have-been-there.index', ['hbts' => $this->havebeentheres]);
    }

    public function new()
    {
        $this->isModalOpen = true;
    }

    public function edit(HaveBeenThereModel $havebeenthere)
    {
        $this->editing = $havebeenthere;
        $this->isModalOpen = true;
        //$this->emit('ckeditorLoaded');
        //$this->dispatchBrowserEvent('ckeditorLoaded');
    }
    public function save() {
        $this->validate();
        $this->editing->save();
        $this->isModalOpen = false;
    }
    

    public function modalClose()
    {
        $this->isModalOpen = false;
    }
}
