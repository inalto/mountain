<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReportsCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reports_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.category.index');
    }

    public function create()
    {
        abort_if(Gate::denies('reports_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.category.create');
    }

    public function edit(Category $category)
    {
        abort_if(Gate::denies('reportd_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.category.edit', compact('category'));
    }

    public function show(Category $category)
    {
        abort_if(Gate::denies('reports_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.category.show', compact('category'));
    }
}
