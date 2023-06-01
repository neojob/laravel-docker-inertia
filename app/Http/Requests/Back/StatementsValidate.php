<?php

namespace App\Http\Requests\Back;

use App\Models\Lang;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Library\Translate;
use App\ModelLang;
use Route;
class StatementsValidate extends FormRequest
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
//            'alias' => "required|max:255|unique:articles,alias,".$id,
            'title'      => 'required|max:800',
            'desc'       => 'required|max:1000',
            'link_title' => 'max:800',
            'link_href'  => 'max:255',
            'sort'  => 'required|numeric',
        ];
    }
    public function attributes()
    {
        return [
//            'alias'      => 'Alias',
            'title'      => 'Title',
            'desc' => 'Description',
            'link_title'   => 'Link Title',
            'link_href'   => 'Link Href',
            'sort'   => 'Sort',
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
