<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleType extends Model
{
    protected $table = 'article_types';
    public  $incrementing = 'id';
    public $timestamps = false;
    protected $fillable = [
        'title',
        'alias',
        'desc',
        'meta_title',
        'meta_key',
        'meta_desc',
    ];
    public function article(){
        return $this->hasMany(Article::class,'type_id');
    }
}
