<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use App\Traits\Tenantable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Poi extends Model implements HasMedia, TranslatableContract
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use InteractsWithMedia;

    //   use Auditable;
    use Translatable;

    public $table = 'pois';

    public $translatedAttributes = ['name', 'slug', 'content', 'excerpt'];

    public $orderable = [
        'id',
        'name',
        'slug',
        'height',
    ];

    public $filterable = [
        'id',
        'name',
        'height',
        'approved',
        'published',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'height',
        'excerpt',
        'content',
        'location',
        'bibliography',
        'approved',
        'published',
    ];

    public $casts = [
        'location' => 'array',

    ];

    protected $appends = [
        'photos',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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

    public function getPhotosAttribute()
    {
        return $this->getMedia('poi_photos')->map(function ($item) {
            $media = $item->toArray();
            $media['url'] = $item->getUrl();
            $media['thumbnail'] = $item->getUrl('thumbnail');
            $media['preview_thumbnail'] = $item->getUrl('preview_thumbnail');
            $media['preview'] = $item->getUrl('preview');

            return $media;
        });
    }

    public function getLocationAttribute($value)
    {
        $out = json_decode($value, true);
        if (empty($out['lat'])) {
            $out['lat'] = 45;
        }
        if (empty($out['lon'])) {
            $out['lon'] = 7;
        }

        return $out;
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
