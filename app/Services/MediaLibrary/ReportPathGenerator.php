<?php

namespace App\Services\MediaLibrary;

use App\Models\Report;
use Cache;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Str;

class ReportPathGenerator implements PathGenerator
{
    /*
       * Get the path for the given media, relative to the root storage path.
       */
    public function getPath(Media $media): string
    {
        //caching the report owner name to avoid multiple queries
        $prepend = Cache::remember('report_owner_name_'.$media->model_id, 60, function () use ($media) {
            $r = Report::find($media->model_id);
            if ($r) {
                return Str::slug($r->owner()->first()->name);
            } else {
                ray('report not found: '.$media->model_id.' Media id: '.$media->id.' Collection: '.$media->collection_name);

                return;
            }
        });

        //$prepend = Str::slug(Report::find($media->model_id)->owner()->first()->name);
        if ($media->collection_name == 'report_tracks') {
            $prepend .= '/reports/'.$media->model_id.'/tracks';
        } else {
            $prepend .= '/reports/'.$media->model_id;
        }
        //ray($prepend);
        return $prepend.'/';
    }

    /*
     * Get the path for conversions of the given media, relative to the root storage path.
     */
    public function getPathForConversions(Media $media): string
    {
        return $this->getPath($media).'conversions/';
    }

    /*
     * Get the path for responsive images of the given media, relative to the root storage path.
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getPath($media).'responsive-images/';
    }
}
