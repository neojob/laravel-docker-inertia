<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    public  $incrementing = 'id';
    protected $fillable = [
        'title',
        'alias',
        'desc',
        'meta_title',
        'meta_key',
        'meta_desc'
    ];
    public function products(){
        return $this->hasMany(Product::class,'category_id');
    }
}
