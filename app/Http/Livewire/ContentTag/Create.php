<?php

namespace App\Http\Livewire\ContentTag;

use App\Models\ContentTag;
use Livewire\Component;

class Create extends Component
{
    public ContentTag $contentTag;

    public function mount(ContentTag $contentTag)
    {
        $this->contentTag = $contentTag;
    }

    public function render()
    {
        return view('livewire.content-tag.create');
    }

    public function submit()
    {
        $this->validate();

        $this->contentTag->save();

        return redirect()->route('admin.content-tags.index');
    }

    protected function rules(): array
    {
        return [
            'contentTag.name' => [
                'string',
                'required',
            ],
            'contentTag.slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
