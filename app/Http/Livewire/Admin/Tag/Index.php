<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Http\Livewire\WithConfirmation;
use App\Http\Livewire\WithSorting;
use App\Models\Tag;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
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

    protected $listeners = ['slugUpdated' => 'slugUpdated', 'nameUpdated' => 'nameUpdated'];

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
        $this->orderable = (new Tag())->orderable;
    }

    public function slugUpdated($id, $slug)
    {
        Tag::where('id', $id)->update(['slug' => $slug]);
    }

    public function nameUpdated($id, $name)
    {
        $slug = Str::slug($name);
        Tag::where('id', $id)->update(['name' => $name, 'slug' => $slug]);
    }

    public function save($tag)
    {
        ray($tag);
    }

    public function render()
    {
        $query = Tag::advancedFilter([
            's' => $this->search ?: null,
            'order_column' => $this->sortBy,
            'order_direction' => $this->sortDirection,
        ]);

        $tags = $query->paginate($this->perPage);

        return view('livewire.admin.tag.index', compact('query', 'tags', 'tags'));
    }

    public function deleteSelected()
    {
        abort_if(Gate::denies('inalto_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        Tag::whereIn('id', $this->selected)->delete();

        $this->resetSelected();
    }

    public function delete(Tag $tag)
    {
        abort_if(Gate::denies('inalto_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tag->delete();
    }
}
