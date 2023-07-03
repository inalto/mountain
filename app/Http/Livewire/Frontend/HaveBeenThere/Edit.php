<?php

namespace App\Http\Livewire\Frontend\HaveBeenThere;

use App\Models\HaveBeenThere;
use App\Models\Report;
use Livewire\Component;
use Carbon\Carbon;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;
class Edit extends Component
{
    use WithMedia;
    public $listeners = ['hbtIndexRefresh' => '$refresh', 'hbtEdit' => 'edit'];
   
    public $mediaComponentNames = ['photos', 'tracks'];

    public $route;
    public $havebeenthere;
    public $owner_id;
    public $report_id;
    public $photos;
    public $tracks;

    public $rules=[
            'havebeenthere.owner_id' => [
                'required',
                'integer',
            ],
            'havebeenthere.report_id' => [
                'required',
                'integer',
            ],
            'havebeenthere.title' => [
                'string',
                'required',
            ],
            'havebeenthere.date' => [
                'required',
//                'date_format: "Y-m-d H:i:s"',
            ],
            'havebeenthere.time_a' => [
                'string',
                'nullable',
            ],
            'havebeenthere.time_r' => [
                'string',
                'nullable',
            ],
            'havebeenthere.content' => [
                'string',
                'required',
            ],
            'photos' => [
                'array',
                'nullable',
            ],
            'photos.*.id' => [
                'integer',
                'exists:media,id',
            ],
            'tracks' => [
                'array',
                'nullable',
            ],
            'tracks.*.id' => [
                'integer',
                'exists:media,id',
            ],
        ];
    

    public function mount($id)
    {
        $this->havebeenthere = HaveBeenThere::findOrFail($id);
        $this->route = url()->previous();
        //get auth user id
        if (!$this->owner_id) {
            $this->owner_id = auth()->user()->id;
        }
        if ($this->havebeenthere->report_id) {
            $this->report_id = $this->havebeenthere->report_id;
        }
        
        if (empty($this->havebeenthere->date)) {
            $this->date = Carbon::now();
        }
        
    }

    public function render()
    {
        return view('livewire.frontend.have-been-there.edit');
    }

    public function save()
    {
        $this->validate();
        $this->havebeenthere->syncFromMediaLibraryRequest($this->photos)->withCustomProperties('title', 'author')->toMediaCollection('havebeenthere_photos');

        $this->havebeenthere->save();
      // go to previous page
        return redirect($this->route);
    }

    public function cancel()
    {
        // go to previous page
        return redirect($this->route);
    }

    protected function syncMedia(): void
    {
        collect($this->photos)->flatten(1)
            ->each(fn ($item) => Media::where('uuid', $item['uuid'])
            ->update(['model_id' => $this->havebeenthere->id]));

        Media::whereIn('uuid', $this->mediaToRemove)->delete();
    }
}
?>