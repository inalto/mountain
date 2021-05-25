<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DatePicker extends Component
{
    public $name = 'date';
    public $model = 'datepickerValue';
    
    public function render()
    {
        return view('livewire.datepicker');
    }
}
