<?php

namespace App\Services\MediaLibrary;

use Str;
use App\Models\User;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Cache;

class UserPathGenerator implements PathGenerator
{
    /*
       * Get the path for the given media, relative to the root storage path.
       */
    public function getPath(Media $media): string
    {
        $prepend = Cache::remember('user_name_'.$media->model_id, 60, function () use ($media) {
            return Str::slug(User::find($media->model_id)->name);
        });

//        $prepend = Str::slug(User::find($media->model_id)->name);
        $prepend .= '/avatar';
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
