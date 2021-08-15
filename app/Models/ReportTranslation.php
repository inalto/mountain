<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ReportTranslation extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = ['title', 'slug','content','excerpt'];
    public $timestamps = false;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
}