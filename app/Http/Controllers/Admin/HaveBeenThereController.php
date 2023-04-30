<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HaveBeenThere;
use Gate;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HaveBeenThereController extends Controller
{
    protected $havebeentheres;

    public function index()
    {
        abort_if(Gate::denies('inalto_havebeenthere_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.have-been-there.index');
    }

    public function create()
    {
        abort_if(Gate::denies('inalto_havebeenthere_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.have-been-there.create');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('inalto_havebeenthere_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $havebeenthere = HaveBeenThere::query()->where('id', '=', $id)->get()->first();

        return view('admin.have-been-there.edit', ['havebeenthere' => $havebeenthere]);
    }

    /*
        public function show($category, $slug)
        {
            abort_if(Gate::denies('inalto_havebeenthere_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

            $report->load('tags', 'categories', 'owner');

            return view('admin.havebeenthere.show', compact('report'));
        }
    */
    public function store(Request $request)
    {
        ray($request);
    }

    public function storeMedia(Request $request)
    {
        ray('storeMedia');

        abort_if(Gate::none(['inalto_havebeenthere_create', 'inalto_havebeenthere_edit']), Response::HTTP_FORBIDDEN, '403 Forbidden');

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

        $model = new HaveBeenThere();
        $model->id = $request->input('model_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('file')->toMediaCollection($request->input('collection_name'));
        $media->wasRecentlyCreated = true;

        return response()->json(compact('media'), Response::HTTP_CREATED);
    }
}
