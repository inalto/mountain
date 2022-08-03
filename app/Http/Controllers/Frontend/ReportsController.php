<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Models\Category as Category;
use App\Models\Report;
use App\Support\Inalto\ParseReport;

class ReportsController extends Controller
{
    use MediaUploadingTrait;

    public function show($category, $slug, $id = null)
    {
        if (! empty($id)) {
            $report = Report::findOrFail($id);
            $report->load('tags', 'categories', 'owner');

            return view('report', compact('report'));
        }
        \App::setLocale('it');

        if ($category == 'none') {
            $reports = Report::with('categories')->doesntHave('categories')->whereTranslation('slug', $slug)->get();
            if ($reports->count() > 1) {
                $reports = Report::with('categories')->doesntHave('categories')->whereTranslation('slug', $slug)->get();

                return view('conflict', compact('reports'));
            } else {
                $report = $reports->first();

                return view('report', compact('report'));
            }
        } else {
            $category = Category::whereTranslation('slug', $category)->get()->first();
            $report = Report::with('categories')->whereHas('categories', function ($query) use ($category) {
                //$query->whereTranslation('slug','escursionismo');
                $query->where('id', '=', $category->id);
            })->whereTranslation('slug', $slug)->get()->first();
            $report->content = ParseReport::beautify($report->content);
            $report->load('tags', 'owner');

            return view('report', compact('report'));
        }
    }
}
