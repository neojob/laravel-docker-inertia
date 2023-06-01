<?php
namespace App\Http\Controllers\sAuth\Back;

use Composer\Downloader\TransportException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\sAuth\Back\LoginBackValidate;
use Illuminate\Support\Facades\Auth;
use View;
class LoginBackController extends Controller
{
    public function login(){
        View::share('page_title','Login');
        return view('s_auth.back.login');
    }

    public function postLogin( LoginBackValidate $vRequest){

        $credentials = $vRequest->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if(Auth::user()->roles()->first()->alias == 'super_admin'){
                return redirect( route('adminDashboard'));
            }else{
                return redirect()->back()->with(['error' => 'Incorrect Email or Password']);
            }
        }else {
            return redirect()->back()->with(['error' => 'Incorrect Email or Password']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect( route('loginBack') );
    }
}
