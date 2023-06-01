<?php

namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Back;
use View;

class MainBackController extends Back
{
    public function main()
    {
         View::share('page_title', 'Dashboard');
        return view('back.main.main');
    }
}
