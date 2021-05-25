<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\Poi;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PoiController extends Controller
{
=======
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPoiRequest;
use App\Http\Requests\StorePoiRequest;
use App\Http\Requests\UpdatePoiRequest;
use App\Models\Poi;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PoiController extends Controller
{
    use MediaUploadingTrait;

>>>>>>> master
    public function index()
    {
        abort_if(Gate::denies('poi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

<<<<<<< HEAD
        return view('admin.poi.index');
=======
        $pois = Poi::all();

        return view('admin.pois.index', compact('pois'));
>>>>>>> master
    }

    public function create()
    {
        abort_if(Gate::denies('poi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

<<<<<<< HEAD
        return view('admin.poi.create');
=======
        return view('admin.pois.create');
    }

    public function store(StorePoiRequest $request)
    {
        $poi = Poi::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $poi->id]);
        }

        return redirect()->route('admin.pois.index');
>>>>>>> master
    }

    public function edit(Poi $poi)
    {
        abort_if(Gate::denies('poi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

<<<<<<< HEAD
        return view('admin.poi.edit', compact('poi'));
=======
        return view('admin.pois.edit', compact('poi'));
    }

    public function update(UpdatePoiRequest $request, Poi $poi)
    {
        $poi->update($request->all());

        return redirect()->route('admin.pois.index');
>>>>>>> master
    }

    public function show(Poi $poi)
    {
        abort_if(Gate::denies('poi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

<<<<<<< HEAD
        $poi->load('owner');

        return view('admin.poi.show', compact('poi'));
=======
        return view('admin.pois.show', compact('poi'));
    }

    public function destroy(Poi $poi)
    {
        abort_if(Gate::denies('poi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poi->delete();

        return back();
    }

    public function massDestroy(MassDestroyPoiRequest $request)
    {
        Poi::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('poi_create') && Gate::denies('poi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Poi();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
>>>>>>> master
    }
}
