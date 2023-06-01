<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    public  $incrementing = 'id';
    public $timestamps = false;
    protected $fillable = [
        'path',

    ];
    public function articles()
    {
        return $this->belongsToMany(Article::class, 'article_images', 'image_id', 'article_id');
    }

}
