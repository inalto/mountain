<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Map extends Component
{
    public $latitude;
    public $longitude;
    public $pins;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($latitude, $longitude, $pins)
    {
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->pins = $pins;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.map');
    }
}
