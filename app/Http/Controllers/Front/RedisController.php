<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class RedisController extends Controller
{
    public function index()
    {

        Redis::transaction(function () {
            Redis::incr('user_visits');
        });

        Redis::set('user:1:number', 777);
        Redis::set('user:2:number', 888);
        Redis::set('user:3:number', 555);

        for ($i = 0; $i <= 3; $i++ ){
            echo Redis::get('user:'.$i.':number')."<br>";
        }
        echo Redis::get('user_visits')."<br>";
    }
}
