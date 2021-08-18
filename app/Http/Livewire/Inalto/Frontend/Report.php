<?php

namespace App\Http\Livewire\Inalto\Frontend;

use Livewire\Component;
use App\Models\Report as R;

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
        return view('livewire.inalto.frontend.report',['report'=> $this->report]);
    }
}
