<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoryTranslation extends Model
{
    use HasFactory;
    use Sluggable;

    public $table = 'categories_translations';

    protected $fillable = ['name', 'slug','description'];
    public $timestamps = false;

    public function sluggable():array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
}
