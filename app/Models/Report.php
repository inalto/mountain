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
use Laravel\Scout\Searchable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Tags\HasTags;

class Report extends Model implements HasMedia, TranslatableContract
{
    //    use HasTags;

    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Tenantable;
    use InteractsWithMedia;
    use Searchable;

    //  use Auditable;
    use Translatable;

    public $table = 'reports';

    public $translatedAttributes = ['title', 'slug', 'content', 'excerpt', 'access', 'info'];

    public $orderable = [
        'id',
        'last_survey',
        'title',
        'slug',
        'difficulty',
        'approved',
        'published',
        'owner.name',
        'category.name',
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

    protected $fillable = [
        //        'title',
        //        'slug',
        'difficulty',
        'nid',
        'height',
        'length',
        'time_a',
        'time_r'
        //        'excerpt',
        //        'content',
    ];

    protected $casts = [
        'period' => 'array',
        'time_a' => 'timestamp',
        'time_r' => 'timestamp',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
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

    public function getPeriodAttribute($value): array
    {
        if ($value == null) {
            return ['m1' => false, 'm2' => false, 'm3' => false, 'm4' => false, 'm5' => false, 'm6' => false, 'm7' => false, 'm8' => false, 'm9' => false, 'm10' => false, 'm11' => false, 'm12' => false];
        } else {
            return json_decode($value, true);
        }
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

    public function getDifficulties(): array
    {
        $difficulties = [];

        switch ($this->category_id) {
            case 1:
                $difficulties = [
                    'T1' => trans('cruds.report.fields.difficulty_class.T1'),
                    'T2' => trans('cruds.report.fields.difficulty_class.T2'),
                    'T3' => trans('cruds.report.fields.difficulty_class.T3'),
                    'T4' => trans('cruds.report.fields.difficulty_class.T4'),
                    'T5' => trans('cruds.report.fields.difficulty_class.T5'),
                ];
                break;
            case 2:
                $difficulties = [
                    'WT1' => trans('cruds.report.fields.difficulty_class.WT1'),
                    'WT2' => trans('cruds.report.fields.difficulty_class.WT2'),
                    'WT3' => trans('cruds.report.fields.difficulty_class.WT3'),
                    'WT4' => trans('cruds.report.fields.difficulty_class.WT4'),
                    'WT5' => trans('cruds.report.fields.difficulty_class.WT5'),
                ];
                break;
            case 3:
                $difficulties = [
                    'MS' => trans('cruds.report.fields.difficulty_class.MS'),
                    'MSA' => trans('cruds.report.fields.difficulty_class.MSA'),
                    'BS' => trans('cruds.report.fields.difficulty_class.BS'),
                    'BSA' => trans('cruds.report.fields.difficulty_class.BSA'),
                    'OS' => trans('cruds.report.fields.difficulty_class.OS'),
                    'OSA' => trans('cruds.report.fields.difficulty_class.OSA'),
                ];
                break;
            case 4:
                $difficulties = [
                    'F-' => trans('cruds.report.fields.difficulty_class.Fm'),
                    'F' => trans('cruds.report.fields.difficulty_class.F'),
                    'F+' => trans('cruds.report.fields.difficulty_class.Fp'),
                    'PD-' => trans('cruds.report.fields.difficulty_class.PDm'),
                    'PD' => trans('cruds.report.fields.difficulty_class.PD'),
                    'PD+' => trans('cruds.report.fields.difficulty_class.PDp'),
                    'AD-' => trans('cruds.report.fields.difficulty_class.ADm'),
                    'AD' => trans('cruds.report.fields.difficulty_class.AD'),
                    'AD+' => trans('cruds.report.fields.difficulty_class.ADp'),
                    'D-' => trans('cruds.report.fields.difficulty_class.Dm'),
                    'D' => trans('cruds.report.fields.difficulty_class.D'),
                    'D+' => trans('cruds.report.fields.difficulty_class.Dp'),
                    'TD-' => trans('cruds.report.fields.difficulty_class.TDm'),
                    'TD' => trans('cruds.report.fields.difficulty_class.TD'),
                    'TD+' => trans('cruds.report.fields.difficulty_class.TDp'),
                    'ED-' => trans('cruds.report.fields.difficulty_class.EDm'),
                    'ED' => trans('cruds.report.fields.difficulty_class.ED'),
                    'ED+' => trans('cruds.report.fields.difficulty_class.EDp'),
                ];
                break;
            case 5:
                $difficulties = [
                    'F' => trans('cruds.report.fields.difficulty_class.F'),
                    'PD' => trans('cruds.report.fields.difficulty_class.PD'),
                    'D' => trans('cruds.report.fields.difficulty_class.D'),
                    'MD' => trans('cruds.report.fields.difficulty_class.MD'),
                    'ED' => trans('cruds.report.fields.difficulty_class.ED'),
                ];
                break;

        }

        return $difficulties;
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

    public function getUrl()
    {
        return $this->category?->translate()?->slug.'/'.$this->slug;
    }

    /*e
    * Relationships
    */

    public function havebeentheres()
    {
        return $this->hasMany(HaveBeenThere::class);
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
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /*
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
*/
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
        if ($this->category == null) {
            return 'none';
        }

        $path = '';
        $path .= $this->category->translate() ? $this->category->translate()->slug : 'none';
        $path .= '/'.$this->translate()->slug;

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

    public function setApprovedAttribute($value)
    {
        return $this->attributes['approved'] = $value ? 1 : 0;
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

    public function scopeIsPublished($query)
    {
        return $query->where('published', '=', true);
    }

    /**
     * Scope a query to only exclude specific Columns.
     *
     * @author Manojkiran.A <manojkiran10031998@gmail.com>
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExclude($query, ...$columns)
    {
        if ($columns !== []) {
            if (count($columns) !== count($columns, COUNT_RECURSIVE)) {
                $columns = iterator_to_array(new \RecursiveIteratorIterator(new \RecursiveArrayIterator($columns)));
            }
            //  ray($this->getTableColumns());
            return $query->select(array_diff($this->getTableColumns(), $columns));
        }

        return $query;
    }

    /**
     * Shows All the columns of the Corresponding Table of Model
     *
     * @author Manojkiran.A <manojkiran10031998@gmail.com>
     * If You need to get all the Columns of the Model Table.
     * Useful while including the columns in search
     *
     * @return array
     **/
    public function getTableColumns()
    {
        return \Illuminate\Support\Facades\Cache::rememberForever('MigrMod:'.filemtime(database_path('migrations')).':'.$this->getTable(), function () {
            return $this->getConnection()->getSchemaBuilder()->getColumnListing($this->getTable());
        });
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

    public function searchableAs(): string
    {
        return 'reports';
    }

    public function searchable(): bool
    {
        return true;
        //return $this->published || $this->approved;
    }
}
