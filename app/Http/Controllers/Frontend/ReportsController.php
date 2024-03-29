<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Category;
use App\Models\Report;
use App\Models\Tag;
use App\Support\Inalto\ParseReport;
use Cache;

class ReportsController extends Controller
{
    use MediaUploadingTrait;

    public function index($category = null)
    {
        if ($category) {
            // cache the category query
            $cat = Category::with('translation')->whereTranslation('slug', $category)->first();
            if ($cat) {
                return view('frontend.reports.index', ['category' => $cat]);
            } else {
                abort(404);
            }
        } else {
            return view('frontend.reports.index', ['category' => null]);
        }
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

    public function show($category, $slug = null, $id = null)
    {
        if (! empty($id)) {
            $report = Report::findOrFail($id);
            $report->load('tags', 'owner');

            return view('report', compact('report'));
        }

        \App::setLocale('it');

        /*
        if (! empty($category)) {
            $category = Category::where('slug', $category)->firstOrFail();
            $reports = Report::where('category_id', $category->id)->get();
        } else {
            $reports = Report::all();
            return view('report', compact('report'));
        }
*/

        if ($category == 'none') {
            $reports = Report::with(['owner',  'media', 'translations'])->whereTranslation('slug', $slug)->get();
            if ($reports->count() > 1) {
                $reports = Report::with(['owner',  'media', 'translations'])->whereTranslation('slug', $slug)->get();

                return view('conflict', compact('reports'));
            } else {
                $report = $reports->first();

                return view('report', compact('report'));
            }
        } else {
            $category_id = Category::with('translations')->whereTranslation('slug', $category)->get()->first()->id;
            $report = Report::with(['owner', 'tags', 'media', 'translations'])->where('category_id', $category_id)->whereTranslation('slug', $slug)->get()->first();

            if (! $report) {
                abort(404);
            }
            $report->access = ParseReport::beautify($report->access);
            $report->excerpt = ParseReport::beautify($report->excerpt);
            $report->content = ParseReport::beautify($report->content);
//            $report->load('tags', 'owner');

            return view('frontend.reports.report', compact('report'));
        }
    }
}
