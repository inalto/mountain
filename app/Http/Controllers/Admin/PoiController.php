<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poi;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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
}
