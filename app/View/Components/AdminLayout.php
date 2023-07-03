<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class AdminLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $categories = Category::query()->get();

        return view('layouts.admin', ['categories' => $categories]);
    }
}
