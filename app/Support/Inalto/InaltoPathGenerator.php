<?php
namespace App\Support\Inalto;

use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Str;
use App\Models\Report;

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
        
        switch($media->model_type){
            case 'App\Models\Report':
                $prepend = Str::slug(Report::find($media->model_id)->owner()->pluck('name')->first());    
                $prepend .='/reports/';
                break;
            case 'App\Models\Poi':
                $prepend = Str::slug(Report::find($media->model_id)->owner()->pluck('name')->first());    
                $prepend .='/pois/';
                break;

        }
        

        return $prepend.$media->model_id;
    }

    
}