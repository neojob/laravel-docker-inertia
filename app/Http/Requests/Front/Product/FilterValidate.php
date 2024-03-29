<?php

namespace App\Http\Requests\Front\Product;

use Illuminate\Foundation\Http\FormRequest;


class FilterValidate extends FormRequest
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
                'title' => 'string',
                'desc'=>'string',
                'category_id'=> 'integer',
            ];
    }
}
