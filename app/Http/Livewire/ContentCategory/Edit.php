<?php

namespace App\Http\Livewire\ContentCategory;

use App\Models\ContentCategory;
use Livewire\Component;

class Edit extends Component
{
    public ContentCategory $contentCategory;

    public function mount(ContentCategory $contentCategory)
    {
        $this->contentCategory = $contentCategory;
    }

    public function render()
    {
        return view('livewire.content-category.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->contentCategory->save();

        return redirect()->route('admin.content-categories.index');
    }

    protected function rules(): array
    {
        return [
            'contentCategory.name' => [
                'string',
                'required',
            ],
            'contentCategory.slug' => [
                'string',
                'nullable',
            ],
        ];
    }
}
