<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    public  $incrementing = 'id';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'alias',
        'desc',
        'meta_title',
        'meta_key',
        'meta_desc',
        'image_id',
        'type_id',
    ];
    public function images()
    {
        return $this->belongsToMany(Image::class, 'article_images', 'article_id', 'image_id');
    }
    public function articleType(){
        return $this->belongsTo(ArticleType::class,'type_id');
    }
}
