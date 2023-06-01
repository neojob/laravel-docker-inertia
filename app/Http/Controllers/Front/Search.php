<?php
namespace App\Http\Controllers\Front;

use App;
use App\Http\Controllers\Front;
use App\Http\Filters\ProductFilter;
use App\Http\Requests\Front\Product\FilterValidate;
use App\Models\Product;
use Symfony\Component\Console\Input\Input;


class Search extends Front
{
    public function index(FilterValidate $vRequest)
    {
        $data = $vRequest->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->paginate(5);
dd($products);
        return view('front.search.search',compact('products'));
    }


}





