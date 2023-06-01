<?php

namespace App\Http\Controllers\Back;

use App\Models\ArticleType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Library\Translate;
use App\Models\Lang;
use App\Http\Requests\Back\ArticlesValidate;
use Validator;
use DB;
use Route;
use Session;
use View;
use App\Models\Image;
use Storage;


class Articles extends Controller
{

    protected $data;

    public function __construct(Article $data)
    {
        $this->data = $data;
    }

    public function articlesList(Request $request){

        $data = $this->data->latest('id')->paginate(10);
        if ($request->ajax()) {
            return view('back.articles.load', ['data' => $data])->render();
        }
        View::share('page_title', 'Article List');

        return view('back.articles.list',compact('data'));

    }

    public function articlesAdd()
    {
        $all_articletypes = ArticleType::all();
        View::share('page_title', 'Add Article ');
        return view('back.articles.add',['all_articletypes' => $all_articletypes]);
    }


    public function postArticlesAdd(ArticlesValidate $vRequest)
    {
        $validated_data = $vRequest->all();

        $data = [
            'alias' => $validated_data['alias'],
            'title' => $validated_data['title'],
            'desc' => $validated_data['desc'],
            'type_id' => $validated_data['type_id'],
            'meta_title' => $validated_data['meta_title'],
            'meta_key' => $validated_data['meta_key'],
            'meta_desc' => $validated_data['meta_desc'],
            'image_id' => 0,
        ];
        $article = new Article();
        $article->fill($data);
        $article->save();

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
                    $article->image_id = $image->id;
                    $article->save();
                ++$i;
                }
                $article->images()->attach($image->id);
            }
        }
        Session::flash('success', 'Successful adding!');
        return redirect()->route('adminArticlesEdit',['id'=> $article->id]);
    }

    public function articlesEdit(Request $request)
    {
        $id = $request->route('id');
        $article = Article::find($id);
        if(!$article){
            abort(404);
        }

        $images = $article->images;

        $all_articletypes = ArticleType::all();
        View::share('page_title', 'Edit Article ');
        return view('back.articles.edit',['data'=>$article,'all_articletypes' => $all_articletypes, 'images' => $images]);
    }

    public function postArticlesEdit(ArticlesValidate $vRequest)
    {
        $id =  Route::current()->parameter('id');
        $article = Article::find($id);
        if(!$article){
            abort(404);
        }
        $validated_data = $vRequest->all();
        $data = [
            'alias' => $validated_data['alias'],
            'title' => $validated_data['title'],
            'desc' => $validated_data['desc'],
            'type_id' => $validated_data['type_id'],
            'meta_title' => $validated_data['meta_title'],
            'meta_key' => $validated_data['meta_key'],
            'meta_desc' => $validated_data['meta_desc'],
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
                $article->images()->attach($image->id);
            }
        }
        Article::find($id)->update($data);
        Session::flash('success', 'Successful updating!');
        return redirect()->route('adminArticlesEdit',['id'=> $id]);
    }

    public function articlesDelete(Request $request)
    {

        $id = $request->route('id');
        $article = Article::find($id);
        if($article){
            $article->delete();
        }else{
            abort(404);
        }
        return redirect()->route('adminArticlesList');
    }

    public function articlesRemoveImg(Request $request)
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

    public function articlesMainImg(Request $request) {
        $id = (int)$request->route('id');
        $art =  (int)$request->route('art');
        $image = Image::find($id);

        $article = Article::find($art);
        if(!$article){
            abort(404);
            echo 'non';die;
        }

        if(!$image){
            abort(404);
            echo 'non';die;
        }
        $article->image_id = $id;
        $article->save();
        echo "ok";die;

    }





}
