<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRawValueRequest extends FormRequest
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
            'raw_id'=> 'required|integer|exists:raws,id',
            'power'=> 'required|numeric',
            'value'=> 'required|numeric',
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
            'raw_id' => 'الخام','value' => 'قيمة power',
        ];
    }
}