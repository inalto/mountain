<?php

namespace App\Support\Inalto;

use App\Models\Category;
use App\Models\Report;
use App\Models\Tag;
use Illuminate\Pagination\LengthAwarePaginator;

class LoadReports
{
    public static function load($page = null, $perPage = null, $category = null, $user_id = null, $tag = null): LengthAwarePaginator
    {
        if ($tag) {
            $t = Tag::where('slug', $tag)->first();
            if ($t) {
                $reports = Report::with(['owner',  'media', 'translations'])->isPublished()->whereHas('tags', function ($query) use ($t) {
                    $query->where('tags.id', $t->id);
                })->orderByTranslation('title', 'asc');
            }
        } elseif ($category) {
            $cat = Category::whereTranslation('slug', $category)->first()->id;
            if ($cat) {
                $reports = Report::with(['owner',  'media', 'translations'])->isPublished()->where('category_id', $cat);
            }
        } elseif ($user_id) {
            $reports = Report::with(['owner',  'media', 'translations'])->where('owner_id', '=', $user_id);
        } else {
            $reports = Report::with(['owner',  'media', 'translations'])->isPublished();
        }

        //$reports = $reports->makeHidden(['content','tracks']);
        return  $reports->orderBy('created_at', 'desc')->paginate($perPage, ['*'], null, $page);
    }
}
