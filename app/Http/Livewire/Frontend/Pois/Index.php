<?php

namespace App\Http\Livewire\Frontend\Pois;

use App\Support\Inalto\LoadPois;
use Livewire\Component;

//use Livewire\WithPagination;

class Index extends Component
{
    //   use WithPagination;
    public $perPage = 1;

    public $page = 12;

    public $category;

    public $tag;

    public $user_id;

    public function mount($page = null, $perPage = null,$user_id = null)
    {
        $this->page = $page ?? 1;
        $this->perPage = $perPage ?? 12;
        $this->user_id = $user_id;
    }

    public function render()
    {
        $pois = LoadPois::load($this->page, $this->perPage, $this->user_id);
        
        return view('livewire.frontend.pois.index', ['pois' => $pois]);
        
    }
}
