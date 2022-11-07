<?php

namespace App\Http\Livewire\HaveBeenThere;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\HaveBeenThere;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Show extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public int $perPage;

    public array $orderable;

    public string $search = '';

    public array $selected = [];

    public array $paginationOptions;

   // public int $id;


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

    public function mount($id=null)
    {
        $this->sortBy = 'id';
        $this->sortDirection = 'desc';
        $this->perPage = 100;
        $this->paginationOptions = config('project.pagination.options');
        
      //  ray($id);

        $this->id = $id;

    }

    public function render()
    {

        $query = HaveBeenThere::where('report_id', $this->id)->orderBy('created_at','desc');

      //  ray($query->get());

        $hbts = $query->paginate($this->perPage);

        return view('livewire.have-been-there.show', compact('query', 'hbts'));
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
