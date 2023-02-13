<?php

namespace App\Http\Livewire\Frontend;

use App\Models\HaveBeenThere as HaveBeenThereModel;
use App\Models\Tag;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;


class HaveBeenThere extends Component
{
    use WithPagination;

    public $category;
    public $tag;
    public $user_id;
    public $report_id;
    public $isModalOpen = false;
    public $isEdit = false;
    private $havebeentheres;
    
    //public $havebeentheres=[];


    public function mount($report_id=null,$category = null, $user = null, $tag = null)
    {
        $this->category = $category;
        $this->user_id = $user;
        $this->tag = $tag;
        $this->report_id = $report_id;
        
    }


    public function render()
    {
        if ($this->report_id) {
            $this->havebeentheres = HaveBeenThereModel::with(['owner', 'media','report'])->where('report_id', $this->report_id)->orderBy('created_at', 'desc');
        } elseif ($this->tag) {
            $tag = Tag::where('slug', $this->tag)->first();
            
            if ($tag) {
                $this->havebeentheres = HaveBeenThereModel::with(['owner', 'media','report'])->whereHas('tags', function ($query) use ($tag) {
                    $query->where('tags.id', $tag->id);
                })->orderByTranslation('title', 'asc');
            } 
        }  else {
            // try to load all the havebeentheres
            $this->havebeentheres = HaveBeenThereModel::with(['owner', 'media','report']);
        }
        if ($this->user_id) {
            $this->havebeentheres = $this->havebeentheres->where('owner_id', '=', $this->user_id);
        }

        $this->havebeentheres = $this->havebeentheres->orderBy('updated_at', 'desc')->paginate(12);

        return view('livewire.frontend.have-been-there.index', ['hbts' => $this->havebeentheres]);
    }

    public function create()
    {
        $this->reset();
        $this->openModalPopover();
    }

    public function openModalPopover()
        {
            $this->isModalOpen = true;
        }
        public function closeModalPopover()
        {
            $this->isModalOpen = false;
        }
        
}
