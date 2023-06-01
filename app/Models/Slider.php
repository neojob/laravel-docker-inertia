<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'sliders';
    public  $incrementing = 'id';
    public  $timestamps = false;
    protected $fillable = [
        'link_title',
        'link_href',
        'desc',
        'path',
        'sort',
        'status',
    ];

}
