<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportTag extends Model
{
    public $table = 'report_tag';

    public $timestamps = false;

    protected $fillable = [
        'report_id',
        'tag_id',
    ];
}
