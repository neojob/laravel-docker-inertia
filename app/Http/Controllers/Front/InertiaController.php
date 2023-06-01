<?php
namespace App\Http\Controllers\Front;

use App;
use App\Http\Controllers\Front;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InertiaController extends Front
{
    public function index(Request $request){
        return Inertia::render('Home',[
            'title' => 'Home'
        ]);
    }
    public function about(Request $request){
        return Inertia::render('About',[
            'title' => 'About'
        ]);
    }


}





