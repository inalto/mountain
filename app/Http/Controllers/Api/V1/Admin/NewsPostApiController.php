<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreNewsPostRequest;
use App\Http\Requests\UpdateNewsPostRequest;
use App\Http\Resources\Admin\NewsPostResource;
use App\NewsPost;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsPostApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('news_post_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewsPostResource(NewsPost::with(['tags', 'categories', 'created_by'])->get());
    }

    public function store(StoreNewsPostRequest $request)
    {
        $newsPost = NewsPost::create($request->all());
        $newsPost->tags()->sync($request->input('tags', []));
        $newsPost->categories()->sync($request->input('categories', []));

        if ($request->input('photos', false)) {
            $newsPost->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
        }

        return (new NewsPostResource($newsPost))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NewsPost $newsPost)
    {
        abort_if(Gate::denies('news_post_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewsPostResource($newsPost->load(['tags', 'categories', 'created_by']));
    }

    public function update(UpdateNewsPostRequest $request, NewsPost $newsPost)
    {
        $newsPost->update($request->all());
        $newsPost->tags()->sync($request->input('tags', []));
        $newsPost->categories()->sync($request->input('categories', []));

        if ($request->input('photos', false)) {
            if (!$newsPost->photos || $request->input('photos') !== $newsPost->photos->file_name) {
                if ($newsPost->photos) {
                    $newsPost->photos->delete();
                }

                $newsPost->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
            }
        } elseif ($newsPost->photos) {
            $newsPost->photos->delete();
        }

        return (new NewsPostResource($newsPost))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NewsPost $newsPost)
    {
        abort_if(Gate::denies('news_post_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsPost->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
