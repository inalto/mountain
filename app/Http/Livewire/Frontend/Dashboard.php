<?php

namespace App\Http\Livewire\Frontend;


use Livewire\Component;
use App\Models\HaveBeenThere;
use App\Models\Report;

class Dashboard extends Component
{

    public $hbt_count = 0;
    public $report_count = 0;

    public $last_reports;

    public function mount()
    {
        $this->hbt_count = HaveBeenThere::where('owner_id', auth()->user()->id)->count();
        $this->report_count = Report::where('owner_id', auth()->user()->id)->count();
        $this->last_reports = Report::where('owner_id', auth()->user()->id)->orderBy('created_at', 'desc')->take(5)->get();
    }

    public function render()
    {
        return view('livewire.frontend.dashboard');
    }
}
