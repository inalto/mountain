<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReportsTagRequest;
use App\Http\Requests\UpdateReportsTagRequest;
use App\Http\Resources\Admin\ReportsTagResource;
use App\Models\ReportsTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportsTagApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reports_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportsTagResource(ReportsTag::all());
    }

    public function store(StoreReportsTagRequest $request)
    {
        $reportsTag = ReportsTag::create($request->all());

        return (new ReportsTagResource($reportsTag))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(ReportsTag $reportsTag)
    {
        abort_if(Gate::denies('reports_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportsTagResource($reportsTag);
    }

    public function update(UpdateReportsTagRequest $request, ReportsTag $reportsTag)
    {
        $reportsTag->update($request->all());

        return (new ReportsTagResource($reportsTag))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(ReportsTag $reportsTag)
    {
        abort_if(Gate::denies('reports_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportsTag->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
