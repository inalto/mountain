<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Tenantable;
use Cviebrock\EloquentSluggable\Sluggable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;


class HaveBeenThere extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use HasAdvancedFilter;
    use Sluggable;
    use Tenantable;
    use InteractsWithMedia;
    use Searchable;

    public $table = 'havebeentheres';

    protected $appends = [
        'photos',
        'tracks',
    ];

    protected $dates = [
        'date',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'content',
    ];

    public $casts = [
        'location' => 'array',
        'date' => 'datetime:Y-m-d H:i:s',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    public $orderable = [
        'id',
        'title',
        'date',
        'report_id'

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

    /*
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => Carbon::create($value)->format("Y-m-d H:i:s")
        );
    }
*/
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

    public function setApprovedAttribute($value)
    {
        return $this->attributes['approved'] = $value ? 1 : 0;
    }

    public function setPublishedAttribute($value)
    {
        return $this->attributes['published'] = $value ? 1 : 0;
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
/*
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
*/
    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        /*
        $array = $this->toArray();
        ray($array);
        return $array;
        */
        return [

            'title' => $this->title,
            'slug' => $this->slug,
            'content' => $this->content,

        ];
    }

    public function searchableAs(): string
    {
        return 'havebeentheres';
    }

    public function searchable(): bool
    {
        return true;
        //return $this->published || $this->approved;
    }
}
