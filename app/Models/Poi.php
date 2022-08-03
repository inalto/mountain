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
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

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
        'bibliography',
        'approved',
        'published',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
