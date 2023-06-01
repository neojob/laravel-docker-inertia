<?php

namespace App\Http\Requests\Front;

use Illuminate\Foundation\Http\FormRequest;

class MailsValidate extends FormRequest
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


             return [
                 'name' => "required|max:255",
                 'email' => "required|email|max:255",
                 'phone' => 'required|max:255',
                 'subject' => 'required|max:500',
                 'message'=>'required',
             ];



    }
    public function attributes()
    {
        return [
//            'email'        => 'Email',
//            'subject'      => 'Subject',
//            'body'         => 'Body',
//            'phone'        => 'Phone',
//            'full_name'    => 'Name',
        ];
    }

}
