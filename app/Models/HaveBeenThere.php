<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Tenantable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\SoftDeletes;
use DateTimeInterface;
use App\Support\HasAdvancedFilter;
use Laravel\Scout\Searchable;



class HaveBeenThere extends Model  implements HasMedia
{
                                                                                                               
    use HasFactory;
    use SoftDeletes;
    use HasAdvancedFilter;
    use Sluggable;
    use Tenantable;
    use InteractsWithMedia;
    use Searchable;

    public const DIFFICULTY_SELECT = [
        'dif' => 'dif',
        'dif2' => 'dif2',
    ];

    public $table = 'havebeentheres';

    protected $appends = [
        'photos',
        'tracks',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'difficulty',
        'content',
    ];

    
    public $casts = [
        'location' => 'array',
      
    ];
    public $orderable = [
        'id',
        'title',
       
    ];

    public $filterable = [
        'title',
        
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
    public function getTypeAttribute()
    {
        $type = [

            'T1' => 'hiking',
            'T2' => 'hiking',
            'T3' => 'hiking',
            'T4' => 'hiking',
            'T5' => 'hiking',

            'F-' => 'mountaineering',
            'F' => 'mountaineering',
            'F+' => 'mountaineering',
            'PD-' => 'mountaineering',
            'PD' => 'mountaineering',
            'PD+' => 'mountaineering',
            'AD-' => 'mountaineering',
            'AD' => 'mountaineering',
            'AD+' => 'mountaineering',
            'D-' => 'mountaineering',
            'D' => 'mountaineering',
            'D+' => 'mountaineering',
            'TD-' => 'mountaineering',
            'TD' => 'mountaineering',
            'TD+' => 'mountaineering',
            'ED-' => 'mountaineering',
            'ED' => 'mountaineering',
            'ED+' => 'mountaineering',
            'WT1' => 'snowshoeing',
            'WT2' => 'snowshoeing',
            'WT3' => 'snowshoeing',
            'WT4' => 'snowshoeing',
            'WT5' => 'snowshoeing',
            'MS' => 'skimountaineering',
            'MSA' => 'skimountaineering',
            'BS' => 'skimountaineering',
            'BSA' => 'skimountaineering',
            'OS' => 'skimountaineering',
            'OSA' => 'skimountaineering',
        ];

        if (array_key_exists($this->difficulty, $type)) {
            return $type[$this->difficulty];
        }

    }

    public function getDifficultyLabelAttribute($value)
    {
        return static::DIFFICULTY_SELECT[$this->difficulty] ?? null;
    }

    public function getPhotosAttribute()
    {
        return $this->getMedia('havebeenthere_photos')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');                                                                                                                                                                   
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');
            $media['preview'] = $item->getUrl('preview');
            return $media;
        });
    }

    public function getTracksAttribute()
    {
        return $this->getMedia('havebeenthere_tracks')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    /*
    * Relationships
    */
    
    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth = 196;
        $thumbnailPreviewHeight = 196;

        $this->addMediaConversion('thumbnail')
            ->width($thumbnailWidth)
            ->height($thumbnailHeight)
            ->fit('crop', $thumbnailWidth, $thumbnailHeight);
        $this->addMediaConversion('preview_thumbnail')
            ->width($thumbnailPreviewWidth)
            ->height($thumbnailPreviewHeight)
            ->fit('crop', $thumbnailPreviewWidth, $thumbnailPreviewHeight);
        $this
            ->addMediaConversion('preview')
            ->fit(Manipulations::FIT_CROP, 300, 300)
            ->nonQueued();
    }


    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

}
