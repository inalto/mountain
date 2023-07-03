<?php

namespace App\Support\Inalto;


use App\Models\Poi;
use Illuminate\Pagination\LengthAwarePaginator;

class LoadPois
{
    public static function load($page = null, $perPage = null, $user_id = null): LengthAwarePaginator
    {
        if ($user_id) {
            $pois = Poi::with(['owner',  'media', 'translations'])->where('owner_id', '=', $user_id);
        } else {
            $pois = Poi::with(['owner',  'media', 'translations'])->isPublished();
        }

        return  $pois->orderBy('last_survey', 'desc')->paginate($perPage, ['*'], null, $page);
    }
}
