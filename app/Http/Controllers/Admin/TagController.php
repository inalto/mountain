<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TagController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inalto_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tag.index');
    }

    public function create()
    {
        abort_if(Gate::denies('inalto_tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tag.create');
    }

    public function edit(Tag $tag)
    {
        abort_if(Gate::denies('inalto_tag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tag.edit', compact('tag'));
    }

    public function show(Tag $tag)
    {
        abort_if(Gate::denies('inalto_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tag.show', compact('tag'));
    }

    public function search(Request $request)
    {
        if (! empty($request->q)) {
            return response()->json(Tag::where('name', 'like', $request->q.'%')->select('id', 'name as text')->get());
        } else {
            return response()->json([]);
        }
        //abort_if(Gate::denies('inalto_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
      //  return response()->json(Tag::where('name', 'like', $tagname.'%')->select('id', 'name')->get()->toArray());
    }
}
