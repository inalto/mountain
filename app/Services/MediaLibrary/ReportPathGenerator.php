<?php

namespace App\Services\MediaLibrary;

use Str;
use App\Models\Report;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;

class ReportPathGenerator implements PathGenerator
{
    /*
       * Get the path for the given media, relative to the root storage path.
       */
    public function getPath(Media $media): string
    {
        $prepend = Str::slug(Report::find($media->model_id)->owner()->first()->name);
        if ($media->collection_name == 'report_tracks') {
            $prepend .= '/reports/'.$media->model_id.'/tracks';
        } else {
            $prepend .= '/reports/'.$media->model_id;
        }
        //ray($prepend);
        return $prepend."/";
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
