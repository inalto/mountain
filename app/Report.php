<?php

namespace App;

use App\Traits\MultiTenantModelTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\Models\Media;
use \DateTimeInterface;

class Report extends Model implements HasMedia
{
    use SoftDeletes, MultiTenantModelTrait, HasMediaTrait;

    public $table = 'reports';

    protected $appends = [
        'photos',
        'tracks',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const DIFFICULTY_SELECT = [
        'T1' => 'T1',
        'T2' => 'T2',
        'T3' => 'T3',
        'T4' => 'T4',
        'T5' => 'T5',
    ];

    protected $fillable = [
        'title',
        'slug',
        'difficulty',
        'excerpt',
        'content',
        'created_at',
        'updated_at',
        'deleted_at',
        'created_by_id',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

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
}
