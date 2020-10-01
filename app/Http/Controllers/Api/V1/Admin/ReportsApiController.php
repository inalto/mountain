<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Http\Resources\Admin\ReportResource;
use App\Models\Report;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportResource(Report::with(['categories', 'tags', 'created_by'])->get());
    }

    public function store(StoreReportRequest $request)
    {
        $report = Report::create($request->all());
        $report->categories()->sync($request->input('categories', []));
        $report->tags()->sync($request->input('tags', []));

        if ($request->input('photos', false)) {
            $report->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
        }

        if ($request->input('tracks', false)) {
            $report->addMedia(storage_path('tmp/uploads/' . $request->input('tracks')))->toMediaCollection('tracks');
        }

        return (new ReportResource($report))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Report $report)
    {
        abort_if(Gate::denies('report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new ReportResource($report->load(['categories', 'tags', 'created_by']));
    }

    public function update(UpdateReportRequest $request, Report $report)
    {
        $report->update($request->all());
        $report->categories()->sync($request->input('categories', []));
        $report->tags()->sync($request->input('tags', []));

        if ($request->input('photos', false)) {
            if (!$report->photos || $request->input('photos') !== $report->photos->file_name) {
                if ($report->photos) {
                    $report->photos->delete();
                }

                $report->addMedia(storage_path('tmp/uploads/' . $request->input('photos')))->toMediaCollection('photos');
            }
        } elseif ($report->photos) {
            $report->photos->delete();
        }

        if ($request->input('tracks', false)) {
            if (!$report->tracks || $request->input('tracks') !== $report->tracks->file_name) {
                if ($report->tracks) {
                    $report->tracks->delete();
                }

                $report->addMedia(storage_path('tmp/uploads/' . $request->input('tracks')))->toMediaCollection('tracks');
            }
        } elseif ($report->tracks) {
            $report->tracks->delete();
        }

        return (new ReportResource($report))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Report $report)
    {
        abort_if(Gate::denies('report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $report->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
