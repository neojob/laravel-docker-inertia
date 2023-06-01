<?php
namespace App\Http\Controllers\sAuth\Back;

use http\Exception;
use Safe\Exceptions\ExecException;
use Sentinel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

use Mail;
use App\Mail\back\ForgotPasswordEmail;
use View;

class ForgotPasswordBackController extends Controller
{

//    public function forgotPassword(){
//        View::share('page_title','Forgot password');
//        return view('s_auth.back.forgotPassword');
//    }
//    public function postForgotPassword(Request $request){
//
//        $user = User::where('email','=',$request->email)->first();
//        if($user) {
//
//            $code = random_int(1000,10000000);
//            $user->code = $code;
//            $user->save();
//            Mail::to($request->input('email'))->send(new ForgotPasswordEmail($user,$code));
//            return redirect()->back()->with(['success' => 'Reset code was sent to your email.']);
//        }else {
//            return redirect()->back()->with(['error' => 'Not correct email.']);
//        }
//    }
}
