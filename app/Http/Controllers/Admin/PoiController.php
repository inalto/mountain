<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poi;
use Gate;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class PoiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('inalto_poi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.poi.index');
    }

    public function create()
    {
        abort_if(Gate::denies('inalto_poi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.poi.create');
    }

    public function edit(Poi $poi)
    {
        abort_if(Gate::denies('inalto_poi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.poi.edit', compact('poi'));
    }

    public function show(Poi $poi)
    {
        abort_if(Gate::denies('inalto_poi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poi->load('owner');

        return view('admin.poi.show', compact('poi'));
    }

    public function storeMedia(Request $request)
    {
    
        abort_if(Gate::none(['inalto_poi_create', 'inalto_poi_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        $model = new Poi();
        $model->id = $request->input('model_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
