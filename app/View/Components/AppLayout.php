<?php

namespace App\View\Components;

use Illuminate\View\Component;

use App\Models\Category;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $categories = Category::with('children')->whereNull('parent_id')->get();
        
        return view('layouts.app',['categories'=>$categories]);
    }
}
