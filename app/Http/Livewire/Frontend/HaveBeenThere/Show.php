<?php

namespace App\Http\Livewire\Frontend\HaveBeenThere;

use App\Models\HaveBeenThere as HaveBeenThereModel;
use App\Models\Tag;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;


class Show extends Component
{
    use WithPagination;

    public $category;
    public $tag;
    public $user_id;
    private $havebeentheres;
    //public $havebeentheres=[];


    public function mount($category = null, $user = null, $tag = null)
    {
        $this->category = $category;
        $this->user_id = $user;
        $this->tag = $tag;
    }


    public function render()
    {
        if ($this->tag) {
            $tag = Tag::where('slug', $this->tag)->first();
            
            if ($tag) {
                $this->havebeentheres = HaveBeenThereModel::with(['owner', 'media','report'])->whereHas('tags', function ($query) use ($tag) {
                    $query->where('tags.id', $tag->id);
                })->orderByTranslation('title', 'asc');
            } 
            
        }  else {
            $this->havebeentheres = HaveBeenThereModel::with(['owner', 'media','report']);
        }
        if ($this->user_id) {
            $this->havebeentheres = $this->havebeentheres->where('owner_id', '=', $this->user_id);
        }

        $this->havebeentheres = $this->havebeentheres->orderBy('created_at', 'desc')->paginate(12);

        return view('livewire.frontend.have-been-there.show', ['hbts' => $this->havebeentheres]);
    }
}
