<?php

namespace App\Http\Controllers\Front;

use App\Http\Filters\ProductFilter;
use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;

class ProductFilterController extends Controller
{
    public function filter(ProductFilter $request){
        $products = Product::filter($request)->paginate(9);
        $categories = Category::all();

        return view('products',compact(['products', 'categories']));
    }


}
