<?php

namespace App\Http\Controllers\Front;

use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Http\Request;
use App\Http\Controllers\Front;
use App;
use League\Flysystem\Exception;
use View;
use App\Http\Requests\front\MailsValidate;
//use App\Models\Mail;
use Session;
use App\Mail\front\ContactPage;
use Mail;
use App\Models\Category;
use hQuery;
use App\Library\Translate;
use Config;


class Contacts extends Front
{
    public function contact()
    {

        $article = App\Models\Article::where('alias','contacts')->first();
        $all_entities = App\Models\Entity::all();

        $article1 = App\Models\Article::where('alias','contacts1')->first();
        $article2 = App\Models\Article::where('alias','contacts2')->first();

        View::share('meta_title', Translate::text($article['meta_title'],Config::get('currentLang')));
        View::share('meta_key', Translate::text($article['meta_key'],Config::get('currentLang')));
        View::share('meta_description', Translate::text($article['meta_description'],Config::get('currentLang')));
        return view('front.contacts.contact',[
            'article' => $article,
            'article1'=>$article1,
            'article2'=>$article2,
            'all_entities'=>$all_entities
        ]);
    }
    public function postContact(MailsValidate $vRequest)
    {

        $validated_data = $vRequest->all();
        if($validated_data){
            Mail::to(env('CONTACT_EMAIL'))->send(new ContactPage($validated_data));
            echo 'ok';die;
        }
        echo 'not ok'; die;
    }

}







