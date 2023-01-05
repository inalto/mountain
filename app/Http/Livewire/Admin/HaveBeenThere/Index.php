<?php

namespace App\Http\Livewire\Admin\HaveBeenThere;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\HaveBeenThere;
use App\Models\Report;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

    protected $queryString = [
        'search' => [
            'except' => '',
        ],
        'sortBy' => [
            'except' => 'id',
        ],
        'sortDirection' => [
            'except' => 'desc',
        ],
    ];

    public function getSelectedCountProperty()
    {
        return count($this->selected);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function resetSelected()
    {
        $this->selected = [];
    }

    public function mount()
    {
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->perPage = 100;
        $this->paginationOptions = config('project.pagination.options');
        $this->orderable = (new HaveBeenThere())->orderable;
    }

    public function render()
    {
        $query = HaveBeenThere::with('report')->advancedFilter([
            's' => $this->search ?: null,
            'order_column' => $this->sortBy,
          'order_direction' => $this->sortDirection,
        ]);
        $hbts = $query->paginate($this->perPage);
        foreach($hbts as $hbt) {
            $hbt->url=Report::find($hbt->report_id)?->getUrl();
        }
        return view('livewire.admin.have-been-there.index', compact('query', 'hbts'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('inalto_havebeenthere_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        HaveBeenThere::whereIn('id', $this->selected)->delete();
        $this->resetSelected();
    }

    public function delete(HaveBeenThere $hbh)
    {
        abort_if(Gate::denies('inalto_havebeenthere_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hbh->delete();
    }
}
