<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Library\Translate;
use App\ModelLang;
use Route;
class UsersValidate extends FormRequest
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

        if(\Illuminate\Support\Facades\Auth::user()){

            $id  =  \Illuminate\Support\Facades\Auth::user()->id;
            return [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => "required|string|email|max:255|unique:users,email,".$id,
                'country' => 'required|string|max:10',
                'region' => 'required|max:100',
                'street' => 'required|max:250',
                'apartment' => 'required|max:250',
                'city' => 'required|string|max:10',
                'index' => 'max:8',
                'phone' => 'required|string',
                'password' => 'min:6|required',
                'password_confirmation' => 'required|min:6|same:password',
            ];
        }else{

            return [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => "required|string|email|max:255|unique:users,email",
                'country' => 'required|string|max:10',
                'region' => 'required|max:100',
                'street' => 'required|max:250',
                'apartment' => 'required|max:250',
                'city' => 'required|string|max:20',
                'index' => 'max:8',
                'phone' => 'required|string',
                'password' => 'min:6|required',
                'agree' => 'in:DEFAULT,1',
                'password_confirmation' => 'required|min:6|same:password',
            ];
        }


    }

    public function all($data = null)
    {
        $input = parent::all();

        $request_data['first_name'] = $input['first_name'];
        $request_data['last_name'] = $input['last_name'];
        $request_data['country'] = $input['country'];
        $request_data['region'] = $input['region'];
        $request_data['city'] = $input['city'];
        $request_data['index'] = $input['index'];
        $request_data['street'] = $input['street'];
        $request_data['apartment'] = $input['apartment'];
        $request_data['phone'] = $input['phone'];
        $request_data['email'] = $input['email'];
        $request_data['password'] = $input['password'];
        $request_data['password_confirmation'] = $input['password_confirmation'];
        $request_data['agree'] = isset($input['agree']) ? $input['agree'] : 0;

        $this->replace($request_data);

        return parent::all();
    }
}
