<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use App\Traits\Auditable;
use App\Traits\Tenantable;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;
use Laravel\Scout\Searchable;

class Report extends Model implements HasMedia, TranslatableContract
{
    use HasTags;

    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use InteractsWithMedia;
    use Searchable;

    //  use Auditable;
    use Translatable;

    public const DIFFICULTY_SELECT = [
        'dif' => 'dif',
        'dif2' => 'dif2',
    ];

    public $table = 'reports';

    public $translatedAttributes = ['title', 'slug', 'content', 'excerpt','access','info'];

    public $orderable = [
        'id',
        'title',
        'slug',
        'difficulty',
        'owner.name',
        'categories.name',
    ];

    public $filterable = [
        'id',
        'title',
        'slug',
        'difficulty',
        //'tags.name',
        
        //        'excerpt',
        //'content',

        
        //  'categories.name',
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
        'type' => 'string',
        'time_a' => 'timestamp',
        'time_r' => 'timestamp',
    ];

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

    public function getLengthAttribute($value)
    {
        return number_format($value / 100, 2, '.');
    }

    public function setLengthAttribute($value)
    {
        if (is_numeric($value)) {
            $this->attributes['length'] = intval($value * 100);
        } else {
            $this->attributes['length'] = 0;
        }
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

    /*
        public function getCategorySlugAttribute()
        {
            return $this->categories->map(function($qry){ return $qry->translateOrDefault();})->first()?->slug;
        }

        public function getSlugAttribute()
        {
            return $this->map(function($qry){ return $qry->translateOrDefault();})->first()?->slug;
        }
    */


    public function getUrl()
    {
       return $this->categories->first->translate()?->slug.'/'.$this->slug;
    }

    /*
    * Relationships
    */
    

    public function havebeentheres()
    {
        return $this->hasMany(HaveBeenThere::class);
    }
    
    public function oldtags()
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

    public function getTimeAAttribute($value)
    {
        if (empty($value)) {
            return '00:00';
        }

        return Carbon::parse($value)->format('H:i');
    }

    public function getPathAttribute()
    {
        $locale=app()->getLocale();
        $path="";
        $path.= $this->categories->first->translate($locale)?$this->categories->first->translate($locale)->slug:'none';
        $path.= '/'.$this->translate($locale)->slug;
        return $path;
    }

    public function setTimeAAttribute($value)
    {
        $this->attributes['time_a'] = Carbon::parse($value)->toDateTimeString();
    }

    public function getTimeRAttribute($value)
    {
        if (empty($value)) {
            return '00:00';
        }

        return Carbon::parse($value)->format('H:i');
    }

    public function setTimeRAttribute($value)
    {
        //   ray(Carbon::parse($value)->toDateTimeString());
        $this->attributes['time_r'] = Carbon::parse($value)->toDateTimeString();
    }

    public function getBibliographiesAttribute($value)
    {
        return json_decode($value, true, 512, JSON_OBJECT_AS_ARRAY);
    }

    public function setBibliographiesAttribute($value)
    {
        $this->attributes['bibliographies'] = json_encode($value);
    }

    /*
    * Scopes
    */
    public function scopeOwnerNameLike($query, $name)
    {
        return $query->whereHas('owner', function ($q) use ($name) {
            $q->where('name', 'like', '%'.$name.'%');
        });
    }
    public function scopeOrOwnerNameLike($query, $name)
    {
        return $query->orWhereHas('owner', function ($q) use ($name) {
            $q->where('name', 'like', '%'.$name.'%');
        });
    }
    public function scopeOwnerId($query, $id)
    {
        return $query->where('owner_id', $id);
    }

    public function scopeOrderBytitle($query, $order = 'asc')
    {
        return $query->orderBy('title', $order);
    }
    




    
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
            'excerpt' => $this->excerpt,
            'access' => $this->access,
            'content' => $this->content,

          
        ];
        
    }

    public function searchable(): bool

	{
        return true;
    	//return $this->published || $this->approved;

	}

}
