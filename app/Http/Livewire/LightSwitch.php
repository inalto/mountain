<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Session;

class LightSwitch extends Component
{
    public $mode = 'auto';

    public $listeners = ['lightSwitch'];

    public function rules()
    {
        return [
            'mode' => 'required|in:light,dark,auto',
            'open' => 'required|boolean',
        ];
    }

    public function mount()
    {
        $this->mode = Session::get('theme', 'auto');
    }

    public function render()
    {
        return view('livewire.light-switch');
    }

    public function light()
    {
        $this->mode = 'light';
        Session::put('theme', 'light');
        $this->emit('lightSwitch', 'light');
    }

    public function dark()
    {
        $this->mode = 'dark';
        Session::put('theme', 'dark');
        $this->emit('lightSwitch', 'dark');
    }

    public function auto()
    {
        $this->mode = 'auto';
        Session::put('theme', 'auto');
        $this->emit('lightSwitch', 'auto');
    }

    public function lightSwitch($mode)
    {
        $this->mode = $mode;
    }
}
