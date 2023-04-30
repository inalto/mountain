<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Report;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReportController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('report_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.report.index');
    }

    public function create()
    {
        abort_if(Gate::denies('report_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.report.create');
    }

    public function edit(Report $report)
    {
        abort_if(Gate::denies('report_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        //     ray('admin.report.edit', compact('report'));

        return view('admin.report.edit', compact('report'));
    }

    /*
        public function show($category, $slug)
        {
            abort_if(Gate::denies('report_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

            $report->load('tags', 'categories', 'owner');

            return view('admin.report.show', compact('report'));
        }
    */

    /*
    public function store(Request $request)
    {
        ray('store');
        ray($request);
    }
*/

/*
    public function storeMedia(Request $request)
    {
        ray('storeMedia');

        abort_if(Gate::none(['report_create', 'report_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->has('size')) {
            $this->validate($request, [
                'file' => 'max:'.$request->input('size') * 1024,
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

        $model = new Report();
        $model->id = $request->input('model_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }

    */
}
