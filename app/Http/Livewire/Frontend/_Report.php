<?php

namespace App\Http\Livewire\Inalto\Frontend;

use App\Models\Report as R;
use App\Support\Inalto\ParseReport;
use Livewire\Component;

class Report extends Component
{
    //public $slug;

    public $report;

    public function mount()
    {
        //$this->report=R::where('slug','=',$slug)->with('owner')->with('media')->first();
    }

    public function render()
    {
        $this->report->content = ParseReport::beautify($this->report->content);

        return view('livewire.inalto.frontend.report', ['report' => $this->report]);
    }
}
