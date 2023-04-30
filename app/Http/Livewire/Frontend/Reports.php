<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Report;
use App\Support\Inalto\LoadReports;
use Livewire\Component;

//use Livewire\WithPagination;

class Reports extends Component
{
    //   use WithPagination;
    public $perPage = 1;

    public $page = 12;

    public $category;

    public $tag;

    public $user_id;

    public function mount($page = null, $perPage = null, $category = null, $user_id = null, $tag = null)
    {
        $this->page = $page ?? 1;
        $this->perPage = $perPage ?? 12;
        $this->category = $category;
        $this->user_id = $user_id;
        $this->tag = $tag;
    }

    public function render()
    {
        $reports = LoadReports::load($this->page, $this->perPage, $this->category, $this->user_id, $this->tag);
        /*
        ray($reports->through(function ($report, $key) {
            return [
                'title'=> $report->translate()->title,
                'report_photos'=> $report->getFirstMediaUrl('report_photos'),
            ];
        }));
        */
        return view('livewire.frontend.reports.index', ['reports' => $reports]);
        // return view('livewire.frontend.reports.index');
    }
}
