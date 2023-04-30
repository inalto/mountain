<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $categories = Category::withCount(['reports' => function ($query) {
            $query->where('published', true);
        }])->get()->where('reports_count', '>', 0);

        $category = Request::route('category');

        return view('layouts.app', ['categories' => $categories, 'category' => $category]);
    }
}
