<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'content' => 'required|max:255|string'
        ];
    }
    public function messages()
    {
        return [
            'content.required' => '※コメントは必須です',
            'content.max' => '※コメントは255字以内で入力してください',
            'content.string' => '※コメントは文字列で入力してください',
        ];
    }
}
