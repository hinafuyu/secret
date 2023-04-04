<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Contact extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //false から ture 変更
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        //バリデーションルール
        $rules = [
            'name' => ['required', 'max:10'],
            'kana' => ['required', 'max:10'],
            'email' => ['required', 'email'],
            'body' => ['required']
        ];

        return $rules;
    }

    /**
     * 属性名
     * 
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '氏名',
            'kana' => 'フリガナ',
            'email' => 'メールアドレス',
            'body' => 'お問い合わせ内容',
        ];
    }

    /**
     * エラーメッセージ
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => ':attributeは必須項目です。',
            'name.max' => ':attributeは10文字以内で記入してください。',
            'kana.required' => ':attributeは必須項目です。',
            'kana.max' => ':attributeは10文字以内で記入してください。',
            'email.required' => ':attributeは必須項目です。',
            'email.email' => ':attributeは正しくご記入ください。',
            'body.required' => ':attributeは必須項目です。'
        ];
    }
}
