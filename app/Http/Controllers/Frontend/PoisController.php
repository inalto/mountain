<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Poi;

use App\Support\Inalto\ParseReport;
use Cache;

class PoisController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
      
        return view('frontend.pois.index');
      
    }

    public function tag($tag = null)
    {
        if ($tag) {
            $t = Tag::where('slug', $tag)->first();
            // ray($t);
            if ($t) {
                return view('frontend.reports.index', ['tag' => $t]);
            } else {
                abort(404);
            }
        } else {
            return view('frontend.reports.index', ['tag' => null]);
        }
    }

    public function my($category = null)
    {
        $cat = Category::query()->first();

        if ($category) {
            $cat = Category::whereTranslation('slug', $category)->first();
            if ($cat) {
                return view('frontend.reports.my', ['category' => $cat]);
            } else {
                abort(404);
            }
        } else {
            return view('frontend.reports.my', ['category' => null]);
        }
    }

    public function show($slug = null, $id = null)
    {
        if (! empty($id)) {
            $poi = Poi::findOrFail($id);
            $poi->load('tags', 'owner');

            return view('poi', compact('poi'));
        }

        \App::setLocale('it');

            $poi = Poi::with(['owner', 'tags', 'media', 'translations'])->whereTranslation('slug', $slug)->get()->first();

            if (!$poi) {
                abort(404);
            }
            $poi->access = ParseReport::beautify($poi->access);
            $poi->excerpt = ParseReport::beautify($poi->excerpt);
            $poi->content = ParseReport::beautify($poi->content);
//            $report->load('tags', 'owner');

            return view('frontend.pois.show', compact('poi'));
        
    }
}
