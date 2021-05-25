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
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Report extends Model implements HasMedia
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use InteractsWithMedia;
    use Auditable;

    public const DIFFICULTY_SELECT = [
        'dif'  => 'dif',
        'dif2' => 'dif2',
    ];

    public $table = 'reports';

    public $orderable = [
        'id',
        'title',
        'slug',
        'difficulty',
        'excerpt',
        'content',
    ];

    public $filterable = [
        'id',
        'title',
        'slug',
        'difficulty',
        'excerpt',
        'content',
        'tags.name',
        'categories.name',
    ];

    protected $appends = [
        'cover',
        'photo',
        'tracks',
    ];

    

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'slug',
        'difficulty',
        'excerpt',
        'content',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 388, 192);
    }


    public function getDifficultyLabelAttribute($value)
    {
        return static::DIFFICULTY_SELECT[$this->difficulty] ?? null;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }


    public function getCoverAttribute()
    {
        $file = $this->getMedia('photos')->first();
        
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }
        
        return $file;
    }
/*
    public function getPhotosAttribute()
    {
        $files = $this->getMedia('photos');
        $files->each(function ($item) {
            $item->url       = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview   = $item->getUrl('preview');
        });

        return $files;
    }
*/
    public function getPhotoAttribute()
    {
        return $this->getMedia('report_photo')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');

            return $media;
        });
    }


    public function getTracksAttribute()
    {
        return $this->getMedia('tracks');
    }

    public function categories()
    {
        return $this->belongsToMany(ReportsCategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(ReportsTag::class);
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
