<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FibonacciRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'n' => 'required|integer|min:0'
        ];
    }

    public function messages(): array
    {
        return [
            'n.required' => 'パラメータnは必須です。',
            'n.integer' => 'パラメータnは整数でなければなりません。',
            'n.min' => 'パラメータnを0以上の整数に設定してください。'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();
        
        if ($errors->has('n') && $errors->first('n') === 'パラメータnは必須です。') {
            $status = 400;
        } else {
            $status = 422;
        }

        $response = response()->json([
            'status' => 'error',
            'errors' => $errors
        ], $status);

        throw new HttpResponseException($response);
    }
}
