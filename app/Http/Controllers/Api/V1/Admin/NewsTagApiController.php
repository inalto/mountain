<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsTagRequest;
use App\Http\Requests\UpdateNewsTagRequest;
use App\Http\Resources\Admin\NewsTagResource;
use App\NewsTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsTagApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('news_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewsTagResource(NewsTag::all());
    }

    public function store(StoreNewsTagRequest $request)
    {
        $newsTag = NewsTag::create($request->all());

        return (new NewsTagResource($newsTag))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NewsTag $newsTag)
    {
        abort_if(Gate::denies('news_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewsTagResource($newsTag);
    }

    public function update(UpdateNewsTagRequest $request, NewsTag $newsTag)
    {
        $newsTag->update($request->all());

        return (new NewsTagResource($newsTag))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NewsTag $newsTag)
    {
        abort_if(Gate::denies('news_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsTag->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
