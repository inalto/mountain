<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoiTag extends Model
{
    public $table = 'poi_tag';

    public $timestamps = false;

    protected $fillable = [
        'poi_id',
        'tag_id',
    ];
}
