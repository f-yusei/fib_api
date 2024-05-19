<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class FibonacciRequest
 * @package App\Http\Requests
 */
class FibonacciRequest extends FormRequest
{
    /**
     * ユーザーがこのリクエストを承認されているかどうかを判断する
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * リクエストに適用されるバリデーションルールを取得する
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'n' => 'required|integer|min:0'
        ];
    }

    /**
     * バリデーションエラーメッセージを取得する
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'n.required' => 'パラメータnは必須です。',
            'n.integer' => 'パラメータnは整数でなければなりません。',
            'n.min' => 'パラメータnを0以上の整数に設定してください。'
        ];
    }
}
