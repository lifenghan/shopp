<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class Productinfo extends FormRequest
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
            "name"=>"required",
            "detail"=>"required",
        ];
    }

    public function messages()
    {
        return [
            "name.required"=>"属性名不能为空！",
            "detail.required"=>"属性不能为空！",
        ];
    }
}
