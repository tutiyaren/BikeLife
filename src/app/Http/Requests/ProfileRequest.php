<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'nickname' => 'string|max:20'
        ];
    }
    public function messages()
    {
        return [
            'nickname.string' => 'ニックネームを有効な文字列で入力してください',
            'nickname.max' => 'ニックネームは20文字以内で入力してください'
        ];
    }
}
