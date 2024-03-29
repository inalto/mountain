<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Cviebrock\EloquentSluggable\Sluggable;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NewsCategory extends Model
{
    use HasFactory;
    use HasAdvancedFilter;
    use SoftDeletes;
    use Sluggable;

    public $table = 'news_categories';

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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
