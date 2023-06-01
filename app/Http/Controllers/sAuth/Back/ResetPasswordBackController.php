<?php

namespace App\Http\Controllers\sAuth\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;

use App\Models\User;



class ResetPasswordBackController extends Controller
{


    public function resetPassword(Request $request)
    {

        $url = explode('?',$_SERVER['REQUEST_URI']);
        if(!isset($url[1])){
            abort(404);
        }
        $query = explode('&',$url[1]);

        $email = urldecode(explode('=',$query[0])[1]);
        $code =  explode('=',$query[1])[1];

         $user = User::where('email','=',$email)->where('code','=',$code)->first();
         if(!$user)
             abort(404);
         View::share('page_title','Reset password');
         return view('s_auth.back.resetPassword',compact("email","code"));

    }

    public function postResetPassword(Request $request){
         $this->validate($request,
             [
                 'password' => 'confirmed|required|min:6|max:10',
                 'password_confirmation' => 'required|min:6|max:10',
             ]
         );

         $email = $request->all()['email'];
         $code= $request->all()['code'];
         $user = User::where('email','=',$email)->where('code','=',$code)->first();
         if(!$user) {
             abort(404);
         }
         $user->code = '0000';
         $user->password = Hash::make($request->all()['password']);
         $user->save();
         return redirect(route('loginBack'))->with('success', 'Please login with your new password');
    }
}
