<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreReportsCategoryRequest;
use App\Http\Requests\UpdateReportsCategoryRequest;
use App\Http\Resources\Admin\ReportsCategoryResource;
use App\Models\ReportsCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportsCategoryApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('reports_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportsCategoryResource(ReportsCategory::all());
    }

    public function store(StoreReportsCategoryRequest $request)
    {
        $reportsCategory = ReportsCategory::create($request->all());

        return (new ReportsCategoryResource($reportsCategory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReportsCategory $reportsCategory)
    {
        abort_if(Gate::denies('reports_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportsCategoryResource($reportsCategory);
    }

    public function update(UpdateReportsCategoryRequest $request, ReportsCategory $reportsCategory)
    {
        $reportsCategory->update($request->all());

        return (new ReportsCategoryResource($reportsCategory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReportsCategory $reportsCategory)
    {
        abort_if(Gate::denies('reports_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportsCategory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
