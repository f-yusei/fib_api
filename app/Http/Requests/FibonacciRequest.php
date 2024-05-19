<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
}
