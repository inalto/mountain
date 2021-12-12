<?php

namespace App\Models;

use \DateTimeInterface;
use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use App\Traits\Tenantable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Astrotomic\Translatable\Locales;
class Report extends Model implements HasMedia, TranslatableContract
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use InteractsWithMedia;
  //  use Auditable;
    use Translatable;

    
    public const DIFFICULTY_SELECT = [
        'dif'  => 'dif',
        'dif2' => 'dif2',
    ];

    public $table = 'reports';

    public $translatedAttributes = ['title', 'slug','content','excerpt'];

    public $orderable = [
        'id',
        'title',
        'slug',
        'difficulty'
    ];

    public $filterable = [
        'id',
        'title',
        'slug',
        'difficulty',
/*        'excerpt',
        'content',
        */
        'tags.name',
        'categories.name',
    ];

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
//        'title',
//        'slug',
        'difficulty',
        'nid',
        'height',
        'length',
//        'excerpt',
//        'content',
    ];

    protected $casts = [
        'type'=>'string'
    ];


    public function registerMediaConversions(Media $media = null): void
    {
        $thumbnailWidth  = 50;
        $thumbnailHeight = 50;

        $thumbnailPreviewWidth  = 196;
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

    public function getBibliograpiesAttribute($value)
    {
        return json_decode($value);
    }

    public function setBibliographiesAttribute($value=[])
    {
        $this->attributes['bibliographies'] = json_encode($value);
    }


    public function getTypeAttribute()
    {
        $type=[
            
                'T1'=>'hiking',
                'T2'=>'hiking',
                'T3'=>'hiking',
                'T4'=>'hiking',
                'T5'=>'hiking',

                'F-'=>'mountaineering',
                'F'=>'mountaineering',
                'F+'=>'mountaineering',
                'PD-'=>'mountaineering',
                'PD'=>'mountaineering',
                'PD+'=>'mountaineering',
                'AD-'=>'mountaineering',
                'AD'=>'mountaineering',
                'AD+'=>'mountaineering',
                'D-'=>'mountaineering',
                'D'=>'mountaineering',
                'D+'=>'mountaineering',
                'TD-'=>'mountaineering',
                'TD'=>'mountaineering',
                'TD+'=>'mountaineering',
                'ED-'=>'mountaineering',
                'ED'=>'mountaineering',
                'ED+'=>'mountaineering',
                'WT1'=>'snowshoeing',
                'WT2'=>'snowshoeing',
                'WT3'=>'snowshoeing',
                'WT4'=>'snowshoeing',
                'WT5'=>'snowshoeing',
                'MS'=>'skimountaineering',
                'MSA'=>'skimountaineering',
                'BS'=>'skimountaineering',
                'BSA'=>'skimountaineering',
                'OS'=>'skimountaineering',
                'OSA'=>'skimountaineering',
                    ];
                
                    if (array_key_exists($this->difficulty,$type )) {
                      
                    return $type[$this->difficulty];
                    } 
                    
                    return;


    }

    public function getDifficultyLabelAttribute($value)
    {
        return static::DIFFICULTY_SELECT[$this->difficulty] ?? null;
    }

    public function getPhotosAttribute()
    {
        return $this->getMedia('report_photos')->map(function ($item) {
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
        return $this->getMedia('report_tracks')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();

            return $media;
        });
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /*
    public function reportsTranslations()
    {
        return $this->belongsTo(ReportTranslation::class);
    }
*/
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

   
}
