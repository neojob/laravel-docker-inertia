<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Front;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class Posts extends Front
{
    public function index(){
        return new ProductResource(Product::orderByDesc('id')->first());
    }
}
