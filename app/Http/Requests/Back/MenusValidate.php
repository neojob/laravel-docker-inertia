<?php

namespace App\Http\Requests\Back;

use App\Models\Lang;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use App\Library\Translate;
use App\ModelLang;
use Route;
class MenusValidate extends FormRequest
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
            'alias' => "required|max:255",
            'title' => 'required|max:500',
            'group_name'=>'max:500',
            'sort'=>'required|numeric',
            'row'=>'required|numeric',
            'status'=>'required|numeric',
        ];
    }
    public function attributes()
    {
        return [
            'alias'      => 'Alias',
            'title'      => 'Title',
            'group_name' => 'Group Name',
            'sort'   => 'Sort',
            'row'   => 'Row',
            'status'   => 'Status',
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
