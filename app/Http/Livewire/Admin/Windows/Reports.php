<?php

namespace App\Http\Livewire\Admin\Windows;

use App\Models\Report;
use Livewire\Component;

class Reports extends Component
{
    protected $listeners = ['delete'];

    public $count;

    public $sortBy;

    public $sortDirection;

    public function mount()
    {
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->count = 10;
    }

    public function render()
    {
        //$query = Report::with(['tags', 'categories', 'owner'])->advancedFilter([
        // get last 10

        $query = Report::query()->orderBy($this->sortBy, $this->sortDirection)->take($this->count)->get();

        //return view('livewire.admin.report.index', compact('query', 'reports', 'reports'));
    }
}
