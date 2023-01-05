<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Report;
use App\Models\Tag;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;


class Reports extends Component
{
    use WithPagination;

    public $category;
    public $tag;
    public $user_id;
    private $reports;
    //public $reports=[];


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
                $this->reports = Report::with(['owner', 'categories', 'media', 'translations'])->whereHas('tags', function ($query) use ($tag) {
                    $query->where('tags.id', $tag->id);
                })->orderByTranslation('title', 'asc');
            } 
            /*
            else {
                $this->reports = Report::with(['owner', 'categories', 'media', 'translations']);
                //  abort(404);
            }
            */
        } elseif ($this->category) {
            $cat = Category::whereTranslation('slug', $this->category)->first();
            if ($cat) {
                $this->reports = Report::with(['owner', 'categories', 'media', 'translations'])->whereHas('categories', function ($query) use ($cat) {
                    $query->where('categories.id', $cat->id);
                });
            } 
            /*
            else {
                $this->reports = Report::with(['owner', 'categories', 'media', 'translations']);
                //  abort(404);
            }
            */
        } else {
            $this->reports = Report::with(['owner', 'categories', 'media', 'translations']);
        }
        if ($this->user_id) {
            $this->reports = $this->reports->where('owner_id', '=', $this->user_id);
        }

        $this->reports = $this->reports->orderBy('created_at', 'desc')->paginate(12);

        return view('livewire.frontend.reports.index', ['category' => $this->category, 'reports' => $this->reports]);
    }
}
