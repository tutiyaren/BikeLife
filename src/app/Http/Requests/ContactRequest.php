<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
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
        $user = auth()->user();

        // セッションにログインユーザーの情報を保存
        session(['user_data' => [
            'name' => $user->name,
            'email' => $user->email,
        ]]);

        return [
            'name' => [
                'required',
                'string',
                'max:20',
                Rule::in([$user->name]),
            ],
            'email' => [
                'required',
                'email',
                'max:70',
                Rule::in([$user->email]),
            ],
            'comment' => 'required|string|max:400',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必須項目です',
            'name.string' => '名前は文字列で入力してください',
            'name.max' => '名前は20文字以内で入力してください',
            'name.in' => '会員登録した際の名前を使用してください',
            'email.required' => 'メールアドレスは必須項目です',
            'email.email' => '正しいメールアドレスの形式で入力してください',
            'email.max' => 'メールアドレスは70文字以内で入力してください',
            'email.in' => '会員登録した際のメールアドレスを使用してください',
            'comment.required' => 'お問い合わせ内容は必須項目です',
            'comment.string' => 'お問い合わせ内容は文字列で入力してください',
            'comment.max' => 'お問い合わせ内容は400文字以内で入力してください',
        ];
    }
}
