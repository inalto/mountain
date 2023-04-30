<?php

namespace App\Http\Livewire\Admin\Report;

use App\Models\Report;
use Livewire\Component;

class Finder extends Component
{
    public $report_id = 0;

    public $title = null;

    public $search = null;

    public $reports = [];

    public function mount()
    {
        //selecting translated title of report
        if ($this->report_id > 0) {
            $this->title = Report::where('id', $this->report_id)->get()->first()->translate('it')->title;
        }
    }

    public function updatedSearch($value)
    {
        $this->reports = Report::whereTranslationLike('title', '%'.$value.'%')->take(10)->get();
    }

    public function selectReport($id)
    {
        $this->report_id = $id;
        $this->title = Report::where('id', $this->report_id)->get()->first()->translate('it')->title;
        $this->search = null;
        $this->reports = [];
        $this->emit('reportSelected', $this->report_id);
    }

    public function closeWindow()
    {
        $this->search = null;
        $this->reports = [];
    }

    public function render()
    {
        return view('livewire.admin.report.finder');
    }
}
