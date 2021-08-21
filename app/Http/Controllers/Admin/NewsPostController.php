<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsPostController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('news_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.news-post.index');
    }

    public function create()
    {
        abort_if(Gate::denies('news_post_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.news-post.create');
    }

    public function edit(Post $post)
    {
        abort_if(Gate::denies('news_post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.news-post.edit', compact('post'));
    }

    public function show(Post $post)
    {
        abort_if(Gate::denies('post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $post->load('owner');

        return view('admin.news-post.show', compact('post'));
    }

    public function storeMedia(Request $request)
    {
        abort_if(Gate::none(['news_post_create', 'news_post_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:' . $request->input('size') * 1024,
            ]);
        }
        if (request()->has('max_width') || request()->has('max_height')) {
            $this->validate(request(), [
                'file' => sprintf(
                'image|dimensions:max_width=%s,max_height=%s',
                request()->input('max_width', 100000),
                request()->input('max_height', 100000)
                ),
            ]);
        }

        $model                     = new Post();
        $model->id                 = $request->input('model_id', 0);
        $model->exists             = true;
        $media                     = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
