<?php

namespace App\Http\Livewire\Frontend\HaveBeenThere;

use App\Models\HaveBeenThere as HaveBeenThereModel;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;
use Tests\Feature\HaveBeenThereTest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;

class Index extends Component
{
    use WithPagination;

    public $category;

    public $tag;

    public $user_id;

    public $report_id;

    protected $listeners = ['refresh' => '$refresh','delete'];

    private $havebeentheres;

    public HaveBeenThereModel $editing;

    public function mount($report_id = null, $category = null, $user = null, $tag = null)
    {
        $this->editing = new HaveBeenThereModel();

        $this->category = $category;
        if ($user) {
            $this->user_id = $user;
        }
        
        $this->tag = $tag;
        $this->report_id = $report_id;
    }

    public function render()
    {
        if ($this->report_id) {
            $this->havebeentheres = HaveBeenThereModel::where('report_id', $this->report_id)->orderBy('date', 'desc');
        } elseif ($this->tag) {
            $tag = Tag::where('slug', $this->tag)->first();
            if ($tag) {
                $this->havebeentheres = HaveBeenThereModel::with(['owner', 'media', 'report'])->whereHas('tags', function ($query) use ($tag) {
                    $query->where('tags.id', $tag->id);
                })->orderByTranslation('title', 'asc');
            }
        } else {
            // try to load all the havebeentheres
            $this->havebeentheres = HaveBeenThereModel::with(['owner', 'media', 'report']);
        }
        if ($this->user_id) {
            $this->havebeentheres = $this->havebeentheres->where('owner_id', '=', $this->user_id);
        }

        $this->havebeentheres = $this->havebeentheres->orderBy('date', 'desc')->paginate(12);

        return view('livewire.frontend.have-been-there.index', ['hbts' => $this->havebeentheres]);
    }

    public function deleteConfirm($id)
    {
        $this->dispatchBrowserEvent('swal:confirm', [
            'type' => 'warning',
            'title' => 'Are you sure? ',
            'text' => '',
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
        abort_if(Gate::denies('report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        HaveBeenThereModel::find($id)->delete();
        $this->emit('refresh');
        $this->dispatchBrowserEvent('toastr:error', [
            'message' => 'Report deleted',
        ]);
    }

}
