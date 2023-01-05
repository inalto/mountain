<?php

namespace App\Http\Livewire\Admin\NewsCategory;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\NewsCategory;
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
        $this->orderable = (new NewsCategory())->orderable;
    }

    public function render()
    {
        $query = NewsCategory::advancedFilter([
            's' => $this->search ?: null,
            'order_column' => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $newsCategories = $query->paginate($this->perPage);

        return view('livewire.admin.news-category.index', compact('query', 'newsCategories', 'newsCategories'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('news_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        NewsCategory::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(NewsCategory $newsCategory)
    {
        abort_if(Gate::denies('news_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsCategory->delete();
    }
}
