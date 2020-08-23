<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsCategoryRequest;
use App\Http\Requests\UpdateNewsCategoryRequest;
use App\Http\Resources\Admin\NewsCategoryResource;
use App\NewsCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class NewsCategoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('news_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewsCategoryResource(NewsCategory::all());
    }

    public function store(StoreNewsCategoryRequest $request)
    {
        $newsCategory = NewsCategory::create($request->all());

        return (new NewsCategoryResource($newsCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(NewsCategory $newsCategory)
    {
        abort_if(Gate::denies('news_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new NewsCategoryResource($newsCategory);
    }

    public function update(UpdateNewsCategoryRequest $request, NewsCategory $newsCategory)
    {
        $newsCategory->update($request->all());

        return (new NewsCategoryResource($newsCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(NewsCategory $newsCategory)
    {
        abort_if(Gate::denies('news_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $newsCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
