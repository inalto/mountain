<?php

namespace App\Http\Livewire\Frontend;

use App\Support\Inalto\LoadReports;
use Livewire\Component;

//use Livewire\WithPagination;

class LoadMoreReports extends Component
{
    //   use WithPagination;
    public $perPage;

    public $page;

    public $category;

    public $tag;

    public $user_id;

    protected $reports;

    public $loadMore = false;

    public function mount($page = null, $perPage = null, $category = null, $user = null, $tag = null)
    {
        $this->page = $page ?? 1;
        $this->perPage = $perPage ?? 12;
        $this->category = $category;
        $this->user_id = $user;
        $this->tag = $tag;
    }

    public function loadMore()
    {
        $this->page += 1;
        $this->loadMore = true;
    }

    public function render()
    {
        if (! $this->loadMore) {
            return view('livewire.frontend.reports.load-more-reports');
        } else {
            $reports = LoadReports::load($this->page, $this->perPage, $this->category, $this->user_id, $this->tag);

            return view('livewire.frontend.reports.index', [
                'reports' => $reports,
            ]);
        }
    }
}
