<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Tag;

class HaveBeenTheresController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        return view('frontend.have-been-there.index',['uid' => null]);
    }

    public function my()
    {
        return view('frontend.have-been-there.index',['uid' => auth()->user()->id]);
    }

    public function create($id)
    {
        return view('frontend.have-been-there.create', ['id' => $id]);
    }
    public function edit($id)
    {
        return view('frontend.have-been-there.edit', ['id' => $id] );
    }

    public function tag($tag = null)
    {
        if ($tag) {
            $t = Tag::where('slug', $tag)->first();
            // ray($t);
            if ($t) {
                return view('frontend.have-been-there.index', ['tag' => $t]);
            } else {
                abort(404);
            }
        } else {
            return view('frontend.have-been-there.index', ['tag' => null]);
        }
    }
}
