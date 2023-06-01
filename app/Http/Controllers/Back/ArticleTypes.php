<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ArticleType;
use App\Library\Translate;
use App\ModelLang;
use App\Http\Requests\Back\ArticleTypesValidate;
use Validator;
use DB;
use Route;
use Session;
use View;

class ArticleTypes extends Controller
{

    protected $data;

    public function __construct(ArticleType $data)
    {
        $this->data = $data;
    }

    public function articleTypesList(Request $request){

        $data = $this->data->latest('id')->paginate(10);

        if ($request->ajax()) {
            return view('back.articletypes.load', ['data' => $data])->render();
        }
        View::share('page_title', 'ArticleType List');
        return view('back.articletypes.list',compact('data'));

    }

    public function articleTypesAdd()
    {
        View::share('page_title', 'Add ArticleType');
        return view('back.articletypes.add');
    }

    public function postArticleTypesAdd(ArticleTypesValidate $vRequest)
    {
        $validated_data = $vRequest->all();
        $data = [
            'alias' => $validated_data['alias'],
            'title' => $validated_data['title'],
            'desc' => $validated_data['desc'],
            'meta_title' => $validated_data['meta_title'],
            'meta_key' => $validated_data['meta_key'],
            'meta_desc' => $validated_data['meta_desc'],
        ];

        $articletype = new ArticleType();
        $articletype->fill($data);
        $articletype->save();

        Session::flash('success', 'Successful adding!');
        return redirect()->route('adminArticleTypesEdit',['id'=> $articletype->id]);
    }

    public function articleTypesEdit(Request $request)
    {
        $id = $request->route('id');
        $articletype = ArticleType::find($id);
        if(!$articletype){
            abort(404);
        }
        View::share('page_title', 'Edit ArticleType');
        return view('back.articletypes.edit',['data'=>$articletype]);
    }

    public function postArticleTypesEdit(ArticleTypesValidate $vRequest)
    {
        $id =  Route::current()->parameter('id');
        $section = ArticleType::find($id);
        if(!$section){
            abort(404);
        }
        $validated_data = $vRequest->all();
        $data = [
            'alias' => $validated_data['alias'],
            'title' => $validated_data['title'],
            'desc' => $validated_data['desc'],
            'meta_title' => $validated_data['meta_title'],
            'meta_key' => $validated_data['meta_key'],
            'meta_desc' => $validated_data['meta_desc'],
        ];
        ArticleType::find($id)->update($data);
        Session::flash('success', 'Successful updating!');
        return redirect()->route('adminArticleTypesEdit',['id'=> $id]);
    }

    public function articleTypesDelete(Request $request)
    {
        $id = $request->route('id');
        $article_type = ArticleType::find($id);
        if($article_type){
            $article_type->delete();
        }else{
            abort(404);
        }
        return redirect()->route('adminArticleTypesList');
    }

}
