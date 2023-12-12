<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReplieRequest extends FormRequest
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
            'content.required' => '※リプライは必須です',
            'content.max' => '※リプライは255字以内で入力してください',
            'content.string' => '※リプライは文字列で入力してください',
        ];
    }
}
