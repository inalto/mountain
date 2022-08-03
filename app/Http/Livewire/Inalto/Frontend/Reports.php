<?php

namespace App\Http\Livewire\Inalto\Frontend;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;

class Reports extends Component
{
    use WithPagination;

    //public $reports=[];

    /*
     public function mount()
      {
      $this->reports=Report::all();
      dd($this->reports);
      }
*/

    public function render()
    {
        return view('livewire.inalto.frontend.reports', ['reports' => Report::with(['owner','categories','media','translations'])->orderBy('created_at', 'desc')->paginate(12)]);
    }
}
