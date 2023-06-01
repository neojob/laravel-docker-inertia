<?php

namespace App\Http\Controllers\Back;


use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Library\Translate;

use App\Http\Requests\Back\ProductsValidate;
use Validator;
use DB;
use Route;
use Session;
use View;
use App\Models\Image;
use Storage;
use Illuminate\Support\Facades\Input;

class Products extends Controller
{

    protected $data;

    public function __construct(Product $data)
    {
        $this->data = $data;
    }

    public function productsList(Request $request){

//        $type = $request->type;
//
//        if($type){
//            $data = $this->data->where('type_id','=',$type)->latest('created_at')->orderBy('id','DESC')->paginate(200);
//
//            if ($request->ajax()) {
//                return view('back.products.load', ['data' => $data])->render();
//            }
//            View::share('page_title', 'Product List');
//            return view('back.products.list',compact('data'));
//        }

        $data = $this->data->latest('created_at')->orderBy('id','DESC')->paginate(20);

        if ($request->ajax()) {
            return view('back.products.load', ['data' => $data])->render();
        }
        View::share('page_title', 'Product List');
        return view('back.products.list',compact('data'));

    }

    public function productsAdd()
    {
        $all_categories = Category::all();
        View::share('page_title', 'Add Product ');
        return view('back.products.add',['all_categories' => $all_categories]);
    }


    public function postProductsAdd(ProductsValidate $vRequest)
    {
        $validated_data = $vRequest->all();
        $data = [
            'alias' => $validated_data['alias'],
            'title' => $validated_data['title'],
            'desc' => $validated_data['desc'],
            'category_id' => $validated_data['category_id'],
            'meta_title' => $validated_data['meta_title'],
            'meta_key' => $validated_data['meta_key'],
            'meta_desc' => $validated_data['meta_desc'],
            'status' => $validated_data['status'],
            'image_id' => 0,
        ];
        $product = new Product();
        $product->fill($data);
        $product->save();
        $files = $vRequest->file('images');
        if (!empty($files[0]))
        {
            foreach ($files as $image => $value)
            {
                $file = $files[$image]->store('upload');
                $image = new Image();
                $image->fill(['path'=> $file]);
                $image->save();
                $i = 1;
                while ($i == 1) {
                    $product->image_id = $image->id;
                    $product->save();
                ++$i;
                }
                $product->images()->attach($image->id);
            }
        }
        Session::flash('success', 'Successful adding!');
        return redirect()->route('adminProductsEdit',['id'=> $product->id]);
    }

    public function productsEdit(Request $request)
    {
        $id = $request->route('id');
        $product = Product::find($id);
        if(!$product){
            abort(404);
        }

        $images = $product->images;

        $all_categories = Category::all();
        View::share('page_title', 'Edit Product ');
        return view('back.products.edit',['data'=>$product,'all_categories' => $all_categories, 'images' => $images]);
    }

    public function postProductsEdit(ProductsValidate $vRequest)
    {
        $id =  Route::current()->parameter('id');
        $product = Product::find($id);
        if(!$product){
            abort(404);
        }
        $validated_data = $vRequest->all();
        $data = [
            'alias' => $validated_data['alias'],
            'title' => $validated_data['title'],
            'desc' => $validated_data['desc'],
            'category_id' => $validated_data['category_id'],
            'meta_title' => $validated_data['meta_title'],
            'meta_key' => $validated_data['meta_key'],
            'meta_desc' => $validated_data['meta_desc'],
            'status' => $validated_data['status'],
        ];

        $files = $vRequest->file('images');
        if (!empty($files[0]))
        {
            foreach ($files as $image => $value)
            {
                $file = $files[$image]->store('upload');
                $image = new Image();
                $image->fill(['path'=> $file]);
                $image->save();
                $product->images()->attach($image->id);
            }
        }
        Product::find($id)->update($data);
        Session::flash('success', 'Successful updating!');
        return redirect()->route('adminProductsEdit',['id'=> $id]);
    }

    public function productsDelete(Request $request)
    {

        $id = $request->route('id');
        $product = Product::find($id);
        if($product){
            $product->delete();
        }else{
            abort(404);
        }
        return redirect()->route('adminProductsList');
    }
    public function productsRemoveImg(Request $request)
    {
        $id = $request->route('id');
        $image = Image::find($id);
        if($image){
            $image->delete();
            echo "ok";die;
        }else{
            abort(404);
        }
    }

    public function productsMainImg(Request $request) {
        $id = (int)$request->route('id');
        $art =  (int)$request->route('art');
        $image = Image::find($id);

        $product = Product::find($art);
        if(!$product){
            abort(404);
            echo 'non';die;
        }

        if(!$image){
            abort(404);
            echo 'non';die;
        }
        $product->image_id = $id;
        $product->save();
        echo "ok";die;
    }

}
