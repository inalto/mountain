<?php

namespace App\Http\Livewire\Admin\NewsCategory;

use App\Models\NewsCategory;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Livewire\Component;

class Create extends Component
{
    public NewsCategory $newsCategory;

    public function mount(NewsCategory $newsCategory)
    {
        $this->newsCategory = $newsCategory;
    }

    public function render()
    {
        ray($this->newsCategory);

        return view('livewire.admin.news-category.create');
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

    public function updatedNewsCategoryName()
    {
        ray('updatedName');
        $this->newsCategory->slug = SlugService::createSlug(NewsCategory::class, 'slug', $this->newsCategory->name);
    }
}
