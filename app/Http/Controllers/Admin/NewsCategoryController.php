<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Gate;
use Illuminate\Http\Response;

class NewsCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('news_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.news-category.index');
    }

    public function create()
    {
        abort_if(Gate::denies('news_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.news-category.create');
    }

    public function edit(NewsCategory $newsCategory)
    {
        abort_if(Gate::denies('news_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.news-category.edit', compact('newsCategory'));
    }

    public function show(NewsCategory $newsCategory)
    {
        abort_if(Gate::denies('news_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.news-category.show', compact('newsCategory'));
    }
}
