<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Front;
use App;
use View;

use App\Library\Translate;
use Config;
use hQuery;

class Pages extends Front
{
    public function pages(Request $request)
    {
        $alias = Request::route()->parameter('alias');
        $article = App\Models\Article::where('alias','=',$alias)->first();
        if(!$article){
            abort(404);
        }

        $all_entities = App\Models\Entity::all();
        View::share('meta_title', Translate::text($article['meta_title'],Config::get('currentLang')));
        View::share('meta_key', Translate::text($article['meta_key'],Config::get('currentLang')));
        View::share('meta_description', Translate::text($article['meta_desc'],Config::get('currentLang')));

        return view('front.pages.pages',[
            'article' => $article,
            'all_entities' => $all_entities
        ]);
    }


}

