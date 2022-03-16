<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class PoiTranslation extends Model
{
    use HasFactory;
    use Sluggable;

    public $table = 'pois_translations';

    protected $fillable = ['name', 'slug','content','excerpt','bibliography','approved','published'];
    public $timestamps = false;

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
}
