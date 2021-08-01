<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsTag;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsTagController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('news_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.news-tag.index');
    }

    public function create()
    {
        abort_if(Gate::denies('news_tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.news-tag.create');
    }

    public function edit(NewsTag $newsTag)
    {
        abort_if(Gate::denies('news_tag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.news-tag.edit', compact('newsTag'));
    }

    public function show(NewsTag $newsTag)
    {
        abort_if(Gate::denies('news_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.news-tag.show', compact('newsTag'));
    }
}
