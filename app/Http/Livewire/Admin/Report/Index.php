<?php

namespace App\Http\Livewire\Admin\Report;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
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

    protected $listeners = ['delete'];

    public $perPage;

    public $orderable = [];

    public $search = '';

    public $user = '';

    public $selected = [];

    public $paginationOptions = [];

    protected $queryString = [
        'search' => [
            'except' => ['content', 'excerpt', 'tags.name'],
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
        $this->orderable = (new Report())->orderable;
    }

    public function render()
    {
        //$query = Report::with(['tags', 'categories', 'owner'])->advancedFilter([
        $query = Report::advancedFilter([
            's' => $this->search ?: null,
            'order_column' => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $query = $query->orOwnerNameLike($this->search);

        $reports = $query->paginate($this->perPage);

        return view('livewire.admin.report.index', compact('query', 'reports', 'reports'));
    }
    
    public function toggle($what,$id)
    {
        
        $r = Report::find($id);
        $r->{$what} = !$r->{$what};
        $r->save();
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Report::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function deleteConfirm()
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure? ',
            'text' => '',
            'id' => $this->report->id,
        ]);
    }

    public function delete($id)
    {
        abort_if(Gate::denies('report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Report::find($id)->delete();
        $this->dispatchBrowserEvent('toastr:error', [
            'message' => 'Report deleted',
        ]);
    }

    /*
        public function delete(Report $report)
        {
            abort_if(Gate::denies('report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

            $report->delete();
        }
        */
}
