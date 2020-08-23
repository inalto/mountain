<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNewsCategoryRequest;
use App\Http\Requests\StoreNewsCategoryRequest;
use App\Http\Requests\UpdateNewsCategoryRequest;
use App\NewsCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('news_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsCategories = NewsCategory::all();

        return view('admin.newsCategories.index', compact('newsCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('news_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newsCategories.create');
    }

    public function store(StoreNewsCategoryRequest $request)
    {
        $newsCategory = NewsCategory::create($request->all());

        return redirect()->route('admin.news-categories.index');
    }

    public function edit(NewsCategory $newsCategory)
    {
        abort_if(Gate::denies('news_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newsCategories.edit', compact('newsCategory'));
    }

    public function update(UpdateNewsCategoryRequest $request, NewsCategory $newsCategory)
    {
        $newsCategory->update($request->all());

        return redirect()->route('admin.news-categories.index');
    }

    public function show(NewsCategory $newsCategory)
    {
        abort_if(Gate::denies('news_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newsCategories.show', compact('newsCategory'));
    }

    public function destroy(NewsCategory $newsCategory)
    {
        abort_if(Gate::denies('news_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewsCategoryRequest $request)
    {
        NewsCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
