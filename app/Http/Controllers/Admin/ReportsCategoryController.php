<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyReportsCategoryRequest;
use App\Http\Requests\StoreReportsCategoryRequest;
use App\Http\Requests\UpdateReportsCategoryRequest;
use App\ReportsCategory;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ReportsCategoryController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('reports_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportsCategories = ReportsCategory::all();

        return view('admin.reportsCategories.index', compact('reportsCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('reports_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportsCategories.create');
    }

    public function store(StoreReportsCategoryRequest $request)
    {
        $reportsCategory = ReportsCategory::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $reportsCategory->id]);
        }

        return redirect()->route('admin.reports-categories.index');
    }

    public function edit(ReportsCategory $reportsCategory)
    {
        abort_if(Gate::denies('reports_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.reportsCategories.edit', compact('reportsCategory'));
    }

    public function update(UpdateReportsCategoryRequest $request, ReportsCategory $reportsCategory)
    {
        $reportsCategory->update($request->all());

        return redirect()->route('admin.reports-categories.index');
    }

    public function show(ReportsCategory $reportsCategory)
    {
        abort_if(Gate::denies('reports_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportsCategory->load('categoriesReports');

        return view('admin.reportsCategories.show', compact('reportsCategory'));
    }

    public function destroy(ReportsCategory $reportsCategory)
    {
        abort_if(Gate::denies('reports_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reportsCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyReportsCategoryRequest $request)
    {
        ReportsCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('reports_category_create') && Gate::denies('reports_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new ReportsCategory();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
