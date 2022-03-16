<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\App;

class LocaleToggle extends Component
{

    public $locales=[];
    public $currentLocale;

    public function render()
    {
        return view('livewire.locale-toggle');
    }


    public function mount()
    {
        $this->currentLocale=App::currentLocale();
        $locales=config('translatable')['locales'];
        if (is_array($locales)) {
            $this->locales=$locales;
        }
    }
}
