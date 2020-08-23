<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReportsTagRequest;
use App\Http\Requests\StoreReportsTagRequest;
use App\Http\Requests\UpdateReportsTagRequest;
use App\ReportsTag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReportsTagController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('reports_tag_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportsTags = ReportsTag::all();

        return view('admin.reportsTags.index', compact('reportsTags'));
    }

    public function create()
    {
        abort_if(Gate::denies('reports_tag_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportsTags.create');
    }

    public function store(StoreReportsTagRequest $request)
    {
        $reportsTag = ReportsTag::create($request->all());

        return redirect()->route('admin.reports-tags.index');
    }

    public function edit(ReportsTag $reportsTag)
    {
        abort_if(Gate::denies('reports_tag_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportsTags.edit', compact('reportsTag'));
    }

    public function update(UpdateReportsTagRequest $request, ReportsTag $reportsTag)
    {
        $reportsTag->update($request->all());

        return redirect()->route('admin.reports-tags.index');
    }

    public function show(ReportsTag $reportsTag)
    {
        abort_if(Gate::denies('reports_tag_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportsTags.show', compact('reportsTag'));
    }

    public function destroy(ReportsTag $reportsTag)
    {
        abort_if(Gate::denies('reports_tag_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportsTag->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportsTagRequest $request)
    {
        ReportsTag::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
