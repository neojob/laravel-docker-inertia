<?php

namespace App\Http\Requests\sAuth\Back;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Library\Translate;
use App\ModelLang;
use Route;
class ActivationBackValidate extends FormRequest
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
            'alias' => "required|max:255|unique:articles,alias,".$id,
            'title' => 'required|max:765',
            'meta_title'=>'max:765',
            'meta_key'=>'max:765',
            'type_id'=>'required',

        ];
    }
    public function attributes()
    {
        return [
            'alias'      => 'Alias',
            'title'      => 'Title',
            'meta_title' => 'Meta title',
            'meta_key'   => 'Meta key',
            'image_id'   => 'General Image',
        ];
    }
    public function all($key = null)
    {
        $input = parent::all();
        $request_data = Translate::mark_array($input,ModelLang::all());
        $this->replace($request_data);
        return parent::all();
    }
}
