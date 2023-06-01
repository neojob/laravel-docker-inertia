<?php

namespace App\Models;
use App\Filters\QueryFilter;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Filterable;

    protected $fillable = [

        'title',
        'alias',
        'desc',
        'image_id',
        'meta_title',
        'meta_key',
        'meta_desc',
        'category_id',
        'status'
    ];


    public function images(){
        return $this->belongsToMany(Image::class, 'product_images', 'product_id', 'image_id');
    }

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

}
