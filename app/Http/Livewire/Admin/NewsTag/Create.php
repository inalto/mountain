<?php

namespace App\Http\Livewire\Admin\NewsTag;

use App\Models\NewsTag;
use Livewire\Component;

class Create extends Component
{
    public NewsTag $newsTag;

    public function mount(NewsTag $newsTag)
    {
        $this->newsTag = $newsTag;
    }

    public function render()
    {
        return view('livewire.admin.news-tag.create');
    }

    public function submit()
    {
        $this->validate();

        $this->newsTag->save();

        return redirect()->route('admin.news-tags.index');
    }

    protected function rules(): array
    {
        return [
            'newsTag.name' => [
                'string',
                'nullable',
            ],
            'newsTag.slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
