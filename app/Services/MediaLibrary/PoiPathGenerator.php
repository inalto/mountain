<?php

namespace App\Services\MediaLibrary;

use Str;
use App\Models\Poi;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Cache;
class PoiPathGenerator implements PathGenerator
{
    /*
       * Get the path for the given media, relative to the root storage path.
       */
    public function getPath(Media $media): string
    {
         //caching the report owner name to avoid multiple queries
        $prepend = Cache::remember('poi_owner_name_'.$media->model_id, 60, function () use ($media) {
            return Str::slug(Poi::find($media->model_id)->owner()->first()->name);
        });    
        //$prepend = Str::slug(Poi::find($media->model_id)->owner()->first()->name);
        $prepend .= '/pois/'.$media->model_id;
       // ray($prepend);
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
