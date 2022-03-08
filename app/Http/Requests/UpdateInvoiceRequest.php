<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateInvoiceRequest extends FormRequest
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
            'lens_id'=> 'required|integer|exists:lenses',
            'customer'=> 'required|string',

            'rx'=> 'nullable|numeric',
            'ry'=> 'nullable|numeric',
            'rz'=> 'nullable|integer',
            'rb'=> 'nullable|integer',

            'lx'=> 'nullable|numeric',
            'ly'=> 'nullable|numeric',
            'lz'=> 'nullable|integer',
            'lb'=> 'nullable|integer',

            'add1'=> 'nullable|numeric',
            'add2'=> 'nullable|numeric',

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
            'customer' => 'الاسم' ,'lens_id' => ' العدسة' ,
        ];
    }
}
