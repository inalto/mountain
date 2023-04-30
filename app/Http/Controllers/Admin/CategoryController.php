<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inalto_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.category.index');
    }

    public function create()
    {
        abort_if(Gate::denies('inalto_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.category.create');
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('inalto_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.category.edit', compact('category'));
    }

    public function show(Category $category)
    {
        abort_if(Gate::denies('inalto_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.category.show', compact('category'));
    }

    public function search(Request $request)
    {
        return response()->json(
                Category::withTranslation()->get()
                ->map(function ($category) use ($request) {
                    if (str_starts_with(strtolower($category->name), strtolower($request->q))) {
                        return [
                            'id' => $category->id,
                            'text' => $category->name,
                        ];
                    }

                    return false;
                })
                ->reject(function ($value) {
                    return $value === false;
                })
            );
    }
}
