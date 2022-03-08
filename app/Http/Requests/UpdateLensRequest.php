<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateLensRequest extends FormRequest
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
            'name'=> 'required|string|unique:lenses,name,'. floatval($this->route('lens')->id),
            'raw_id' => 'required|integer'

        ];
    }

    public function messages()
    {
        return [

        ];
    }
    public function attributes()
    {
        return [
            'name' => 'اسم العدسة',
            'raw_id' => 'الخام'
        ];
    }
}
