<?php

namespace App\Http\Requests\sAuth\Back;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Library\Translate;
use App\Models\Lang;
use Route;
class RegisterBackValidate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        $id  =  Route::current()->parameter('id') ? Route::current()->parameter('id') : null;
         return [
            'first_name' => "required|max:255",
            'last_name'  => 'required|max:255',
            'email'      =>'required|email|unique:users,email'.$id,
            'password'   =>'required|min:8|confirmed',
            'position'   =>'required|in:1,2,3,4,5',

        ];
    }
    public function attributes()
    {
        return [
            'first_name'=> 'First name',
            'last_name' => 'Last name',
            'email'     => 'Email',
            'password'  => 'Password',
            'password_confirmation'  => 'Password confirmation',
            'position'  => 'Position',
        ];
    }

}
