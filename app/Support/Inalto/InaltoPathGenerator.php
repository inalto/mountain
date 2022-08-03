<?php

namespace App\Support\Inalto;

use App\Models\Report;
use Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Str;

class InaltoPathGenerator implements PathGenerator
{
    /*
       * Get the path for the given media, relative to the root storage path.
       */
    public function getPath(Media $media): string
    {
        return $this->getBasePath($media).'/';
    }

    /*
     * Get the path for conversions of the given media, relative to the root storage path.
     */
    public function getPathForConversions(Media $media): string
    {
        return $this->getBasePath($media).'/conversions/';
    }

    /*
     * Get the path for responsive images of the given media, relative to the root storage path.
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getBasePath($media).'/responsive-images/';
    }

    /*
     * Get a unique base path for the given media.
     */
    protected function getBasePath(Media $media): string
    {
        $prepend = '';

        switch ($media->model_type) {
            case 'App\Models\Report':

                //if (!Report::find($media->model_id)) {Log::error('missing media model_id'.$media->model_id); break;}
                //$prepend = Str::slug(Report::withTrashed()->find($media->model_id)->owner()->first()->name);
                //$prepend = Str::slug(Report::with('owner')->withTrashed()->where('id','=',$media->model_id)->get()->first()->owner->name);
                //$prepend = Str::slug(Report::with('owner')->withTrashed()->find($media->model_id)->owner->name);
                $prepend = Str::slug(Report::find($media->model_id)->owner()->first()->name);

                if ($media->collection_name == 'report_tracks') {
                    $prepend .= '/reports/'.$media->model_id.'/tracks';
                } else {
                    $prepend .= '/reports/'.$media->model_id;
                }
                break;
            case 'App\Models\Poi':
                $prepend = Str::slug(Report::find($media->model_id)->owner()->pluck('name')->first());
                $prepend .= '/pois/'.$media->model_id;
                break;
            case 'App\Models\User':
                $prepend = Str::slug(Report::find($media->model_id)->owner()->pluck('name')->first());
                $prepend .= '/'.$media->model_id;
                break;

        }

        return $prepend;
    }
}
