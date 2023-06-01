<?php
namespace App\Http\Controllers\sAuth\Back;

use App\Events\OnActivationUserEvent;
use App\Http\Controllers\Controller;
use Mail;
use App\Models\Role;
use App\Models\User;
use App\Http\Requests\sAuth\Back\RegisterBackValidate;
use View;
use Hash;
use App\Events\OnRegistrationBackUserEvent;
use Session;
class RegisterBackController extends Controller
{

    public function register(){

        $roles = Role::all()->where('status',1);
        View::share('page_title','Registration');
        return view('s_auth.back.register',compact('roles'));
    }

    public function postRegister(RegisterBackValidate $vRequest ){

        $data = [
             'first_name'=> $vRequest->first_name,
             'last_name'=> $vRequest->last_name,
             'email'=> $vRequest->email,
             'password' => Hash::make($vRequest->password),
             'position' => $vRequest->position
        ];

        $user = $this->create($data);
        $this->activate($user, 1);
        $super_admin_role = Role::where('alias','=','super_admin')->first();
        $super_admin = $super_admin_role->users()->first();


        event(new OnRegistrationBackUserEvent($user));
        return response()->json(['msg' => "You have been registered, but your account doesn't activated yet."], 200);


    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
                'first_name'=> $data['first_name'],
                'last_name'=> $data['last_name'],
                'email'=> $data['email'],
                'password' => Hash::make($data['password']),
        ]);

        $role = Role::where('id','=',$data['position'])->first();
        $user->roles()->attach($role['id']);
         return $user;

    }
    public function activate($user, $status = 1){
        $user->status = $status;
        $user->save();
        return $user;
    }


}
