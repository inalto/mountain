<?php

namespace App\Http\Livewire\Admin\NewsCategory;

use App\Models\NewsCategory;
use Livewire\Component;

class Edit extends Component
{
    public NewsCategory $newsCategory;

    public function mount(NewsCategory $newsCategory)
    {
        $this->newsCategory = $newsCategory;
    }

    public function render()
    {
        return view('livewire.admin.news-category.edit');
    }

    public function submit()
    {
        $this->validate();

        $this->newsCategory->save();

        return redirect()->route('admin.news-categories.index');
    }

    protected function rules(): array
    {
        return [
            'newsCategory.name' => [
                'string',
                'nullable',
            ],
            'newsCategory.slug' => [
                'string',
                'nullable',
            ],
            'newsCategory.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
