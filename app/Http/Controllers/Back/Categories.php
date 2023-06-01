<?php

namespace App\Http\Controllers\Back;

use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Library\Translate;
use App\ModelLang;
use App\Http\Requests\Back\CategoriesValidate;
use Validator;
use DB;
use Route;
use Session;
use View;
use App\Models\City;
class Categories extends Controller
{

    protected $data;

    public function __construct(Category $data)
    {
        $this->data = $data;
    }

    public function categoriesList(Request $request){

        $data = $this->data->latest('id')->paginate(100);

        if ($request->ajax()) {
            return view('back.categories.load', ['data' => $data])->render();
        }
        View::share('page_title', 'Category List');
        return view('back.categories.list',compact('data'));

    }

    public function categoriesAdd()
    {
        View::share('page_title', 'Add Category');
        return view('back.categories.add');
    }

    public function postCategoriesAdd(CategoriesValidate $vRequest)
    {
        $validated_data = $vRequest->all();


        $data = [
            'alias' => $validated_data['alias'],
            'title' => $validated_data['title'],
            'desc' => $validated_data['desc'],
            'meta_title' => $validated_data['meta_title'],
            'meta_key' => $validated_data['meta_key'],
            'meta_desc' => $validated_data['meta_desc']
        ];

        $category = Category::create($data);

        Session::flash('success', 'Successful adding!');
        return redirect()->route('adminCategoriesEdit',['id'=> $category->id]);
    }



    public function categoriesEdit(Request $request)
    {
        $id = $request->route('id');
        $category = Category::find($id);

        if(!$category){
            abort(404);
        }

        View::share('page_title', 'Edit Category');
        return view('back.categories.edit',['data' => $category]);
    }

    public function postCategoriesEdit(CategoriesValidate $vRequest)
    {
        $id =  Route::current()->parameter('id');
        $category = Category::find($id);
        if(!$category){
            abort(404);
        }
        $validated_data = $vRequest->all();
        $data = [
            'alias' => $validated_data['alias'],
            'title' => $validated_data['title'],
            'desc' => $validated_data['desc'],
            'meta_title' => $validated_data['meta_title'],
            'meta_key' => $validated_data['meta_key'],
            'meta_desc' => $validated_data['meta_desc']
        ];
        Category::find($id)->update($data);
        Session::flash('success', 'Successful updating!');
        return redirect()->route('adminCategoriesEdit',['id'=> $id]);
    }

    public function categoriesDelete(Request $request)
    {
        $id = $request->route('id');
        $category = Category::find($id);
        if($category){
            $category->delete();
        }else{
            abort(404);
        }
        return redirect()->route('adminCategoriesList');
    }





}
