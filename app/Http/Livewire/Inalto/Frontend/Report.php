<?php

namespace App\Http\Livewire\Inalto\Frontend;

use Livewire\Component;
use App\Models\Report as R;
use Livewire\WithPagination;
class Report extends Component
{

	use WithPagination;

	public $slug;

	//public $reports=[];

   	public function mount($slug)
	{
	$this->report=R::where('slug','=',$slug)->with('created_by')->with('media')->first();
	}


	public function render()
    {
        return view('livewire.inalto.frontend.report',['report'=> $this->report]);
    }
}
