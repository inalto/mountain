<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportTranslation extends Model
{
    use HasFactory;
    use Sluggable;

    public $table = 'reports_translations';

    protected $fillable = ['title', 'slug', 'content', 'excerpt', 'access', 'info'];

    public $timestamps = false;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title',
            ],
        ];
    }
}
