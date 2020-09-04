<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePoiRequest;
use App\Http\Requests\UpdatePoiRequest;
use App\Http\Resources\Admin\PoiResource;
use App\Poi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PoiApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('poi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PoiResource(Poi::all());
    }

    public function store(StorePoiRequest $request)
    {
        $poi = Poi::create($request->all());

        return (new PoiResource($poi))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Poi $poi)
    {
        abort_if(Gate::denies('poi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PoiResource($poi);
    }

    public function update(UpdatePoiRequest $request, Poi $poi)
    {
        $poi->update($request->all());

        return (new PoiResource($poi))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Poi $poi)
    {
        abort_if(Gate::denies('poi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $poi->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
