<?php

namespace App\Http\Livewire;

use Livewire\Component;

class CoordPicker extends Component
{
    public $coords=[];
    public $open=false;

    public function render()
    {
        return view('livewire.coordpicker');
    }
    public function openWindow()
    {
        $this->open=true;
    }
    public function closeWindow()
    {
        $this->open=false;
    }
    
}
