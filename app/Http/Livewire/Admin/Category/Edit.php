<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;

class Edit extends Component
{
    public Category $category;

    public function mount(Category $category)
    {
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.admin.category.edit');
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
