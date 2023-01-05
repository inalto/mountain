<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Models\Tag;
use Livewire\Component;

class Edit extends Component
{
    public Tag $tag;

    public function mount(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function render()
    {
        return view('livewire.admin.tag.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->tag->save();

        return redirect()->route('admin.tags.index');
    }

    protected function rules(): array
    {
        return [
            'tag.name' => [
                'string',
                'nullable',
            ],
            'tag.slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
