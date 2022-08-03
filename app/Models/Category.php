<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model implements TranslatableContract
{
    use NodeTrait;
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Translatable;

    public $table = 'categories';

    public $translatedAttributes = ['name', 'slug', 'description'];

    public $orderable = [
        'id',
        'name',
        'slug',
        'description',
    ];

    public $filterable = [
        'id',
        'name',
        'slug',
        'description',
    ];

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }
}
