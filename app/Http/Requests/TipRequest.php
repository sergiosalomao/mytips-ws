<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class TipRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'titulo' => 'required|unique:tips',
            'categoria_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'titulo é obrigatorio',
            'categoria_id.required' => 'categoria é obrigatorio'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json($validator->errors(), 422));
    }

}