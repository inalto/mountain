<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyNewsTagRequest;
use App\Http\Requests\StoreNewsTagRequest;
use App\Http\Requests\UpdateNewsTagRequest;
use App\Models\NewsTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsTagController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('news_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsTags = NewsTag::all();

        return view('admin.newsTags.index', compact('newsTags'));
    }

    public function create()
    {
        abort_if(Gate::denies('news_tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newsTags.create');
    }

    public function store(StoreNewsTagRequest $request)
    {
        $newsTag = NewsTag::create($request->all());

        return redirect()->route('admin.news-tags.index');
    }

    public function edit(NewsTag $newsTag)
    {
        abort_if(Gate::denies('news_tag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newsTags.edit', compact('newsTag'));
    }

    public function update(UpdateNewsTagRequest $request, NewsTag $newsTag)
    {
        $newsTag->update($request->all());

        return redirect()->route('admin.news-tags.index');
    }

    public function show(NewsTag $newsTag)
    {
        abort_if(Gate::denies('news_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.newsTags.show', compact('newsTag'));
    }

    public function destroy(NewsTag $newsTag)
    {
        abort_if(Gate::denies('news_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsTag->delete();

        return back();
    }

    public function massDestroy(MassDestroyNewsTagRequest $request)
    {
        NewsTag::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
