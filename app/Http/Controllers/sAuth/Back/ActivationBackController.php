<?php

namespace App\Http\Controllers\sAuth\Back;

use App\Events\onActivationUserEvent;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Activation;
use Sentinel;



class ActivationBackController extends Controller
{

    public function activate($email, $activationCode){

//        $user = User::whereEmail($email)->first();
//        if(Activation::complete($user, $activationCode)){
//            //TODO
//            //This Event is sending email to User and Administrator
////            event(new onActivationUserEvent($user));
//            return redirect(route('Log'));
//        }else{
//
//        }



    }
}
