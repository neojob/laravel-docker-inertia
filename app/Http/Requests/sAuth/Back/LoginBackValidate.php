<?php
namespace App\Http\Requests\sAuth\Back;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Library\Translate;
use App\Models\Lang;
use Route;
class LoginBackValidate extends FormRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
         return [
            'email' => "required|email",
            'password' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'email'      => 'Email',
            'password'      => 'Password',
        ];
    }
    public function all($keys = null)
    {
        $input = parent::all();
        $request_data = Translate::mark_array($input,Lang::all());
        $this->replace($request_data);
        return parent::all();
    }
}
