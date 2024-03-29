<?php

namespace App\Http\Livewire\Admin\Category;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Category;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithSorting;
    use WithConfirmation;

    public $perPage;

    public $orderable = [];

    public $search = '';

    public $selected = [];

    public $paginationOptions = [];

    protected $queryString = [
        'search' => [
            'except' => 'description',
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
        $this->orderable = (new Category())->orderable;
    }

    public function render()
    {
        $query = Category::advancedFilter([
            's' => $this->search ?: null,
            'order_column' => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $categories = $query->paginate($this->perPage);

        return view('livewire.admin.category.index', compact('query', 'categories', 'categories'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('inalto_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Category::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Category $category)
    {
        abort_if(Gate::denies('inalto_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $category->delete();
    }
}
