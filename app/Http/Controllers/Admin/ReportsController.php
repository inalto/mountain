<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyReportRequest;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Report;

use App\ReportsCategory;
use App\ReportsTag;

use App\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ReportsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reports = Report::all();


        $reports_categories = ReportsCategory::get();

        $reports_tags = ReportsTag::get();

        $users = User::get();

        return view('admin.reports.index', compact('reports', 'reports_categories', 'reports_tags', 'users'));

    }

    public function create()
    {
        abort_if(Gate::denies('report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $categories = ReportsCategory::all()->pluck('title', 'id');

        $tags = ReportsTag::all()->pluck('name', 'id');

        return view('admin.reports.create', compact('categories', 'tags'));

    }

    public function store(StoreReportRequest $request)
    {
        $report = Report::create($request->all());

        $report->categories()->sync($request->input('categories', []));
        $report->tags()->sync($request->input('tags', []));


        foreach ($request->input('photos', []) as $file) {
            $report->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
        }

        foreach ($request->input('tracks', []) as $file) {
            $report->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('tracks');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $report->id]);
        }

        return redirect()->route('admin.reports.index');
    }

    public function edit(Report $report)
    {
        abort_if(Gate::denies('report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $categories = ReportsCategory::all()->pluck('title', 'id');

        $tags = ReportsTag::all()->pluck('name', 'id');

        $report->load('categories', 'tags', 'created_by');

        return view('admin.reports.edit', compact('categories', 'tags', 'report'));

    }

    public function update(UpdateReportRequest $request, Report $report)
    {
        $report->update($request->all());

        $report->categories()->sync($request->input('categories', []));
        $report->tags()->sync($request->input('tags', []));


        if (count($report->photos) > 0) {
            foreach ($report->photos as $media) {
                if (!in_array($media->file_name, $request->input('photos', []))) {
                    $media->delete();
                }
            }
        }

        $media = $report->photos->pluck('file_name')->toArray();

        foreach ($request->input('photos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $report->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('photos');
            }
        }

        if (count($report->tracks) > 0) {
            foreach ($report->tracks as $media) {
                if (!in_array($media->file_name, $request->input('tracks', []))) {
                    $media->delete();
                }
            }
        }

        $media = $report->tracks->pluck('file_name')->toArray();

        foreach ($request->input('tracks', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $report->addMedia(storage_path('tmp/uploads/' . $file))->toMediaCollection('tracks');
            }
        }

        return redirect()->route('admin.reports.index');
    }

    public function show(Report $report)
    {
        abort_if(Gate::denies('report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');


        $report->load('categories', 'tags', 'created_by');


        return view('admin.reports.show', compact('report'));
    }

    public function destroy(Report $report)
    {
        abort_if(Gate::denies('report_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $report->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportRequest $request)
    {
        Report::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('report_create') && Gate::denies('report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Report();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
