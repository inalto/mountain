<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class Create extends Component
{
    public Category $category;

    public $categories;

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->categories = Category::all();
    }

    public function render()
    {
        return view('livewire.category.create');
    }

    public function submit()
    {
        $this->validate();

        $this->category->save();

        return redirect()->route('admin.categories.index');
    }

    protected function rules(): array
    {
        return [
            'category.name' => [
                'string',
                'nullable',
            ],
            'category.slug' => [
                'string',
                'nullable',
            ],
            'category.description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
