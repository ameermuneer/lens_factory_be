<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRawRequest extends FormRequest
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
//        dd($this->route('raw')->title) ;
        return [
            'title'=> 'required|numeric|max:20|unique:raws,title,'. floatval($this->route('raw')->id),
            'active'=> 'required|boolean',
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
            'title' => 'الخام',
            'active' => 'حالة الخام'
        ];
    }
}
