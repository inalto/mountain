<?php

namespace App\Services\MediaLibrary;

use App\Models\Report;
use App\Models\HaveBeenThere;
use App\Models\Poi;
use App\Models\User;
use Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator as BasePathGenerator;
use Str;

class InaltoPathGenerator implements BasePathGenerator
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
        return $this->getBasePath($media).'conversions/';
    }

    /*
     * Get the path for responsive images of the given media, relative to the root storage path.
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        return $this->getBasePath($media).'responsive-images/';
    }

    /*
     * Get a unique base path for the given media.
     */ 
    protected function getBasePath(Media $media): string
    {
        $prepend = '';
        ray($media->model_type);
     //   ray($media->model_type);
        switch ($media->model_type) {
            case 'App\Models\Report':

                //if (!Report::find($media->model_id)) {Log::error('missing media model_id'.$media->model_id); break;}
                //$prepend = Str::slug(Report::withTrashed()->find($media->model_id)->owner()->first()->name);
                //$prepend = Str::slug(Report::with('owner')->withTrashed()->where('id','=',$media->model_id)->get()->first()->owner->name);
                //$prepend = Str::slug(Report::with('owner')->withTrashed()->find($media->model_id)->owner->name);
                $prepend = Str::slug(Report::find($media->model_id)->owner()->first()->name);

               // ray($prepend);
                if ($media->collection_name == 'report_tracks') {
                    $prepend .= '/reports/'.$media->model_id.'/tracks';
                } else {
                    $prepend .= '/reports/'.$media->model_id;
                }
                break;
            case 'App\Models\HaveBeenThere':
                $prepend = Str::slug(HaveBeenThere::find($media->model_id)->owner()->first()->name);
                if ($media->collection_name == 'havebeenthere_tracks') {
                    $prepend .= '/havebeenthere/'.$media->model_id.'/tracks';
                } else {
                    $prepend .= '/havebeenthere/'.$media->model_id;
                }
                break;
            case 'App\Models\Poi':
                $prepend = Str::slug(Poi::find($media->model_id)->owner()->pluck('name')->first());
                $prepend .= '/pois/'.$media->model_id;
                break;
            case 'App\Models\User':
                $prepend = Str::slug(User::find($media->model_id)->name);
                $prepend .= '/avatar';
                break;

        }
//ray ($prepend);
        return $prepend;
    }
}
