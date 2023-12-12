<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SceneryRequest extends FormRequest
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
            'title' => 'required|max:24|string',
            'area' => 'required',
            'genre' => 'required',
            'image' => 'required|max:2048|mimes:jpeg,png',
            'content' => 'max:200',
            'image1' => 'max:2048|mimes:jpeg,png',
            'image2' => 'max:2048|mimes:jpeg,png',
            'image3' => 'max:2048|mimes:jpeg,png',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '※タイトルは必須項目です。',
            'title.max' => '※タイトルは24文字以内で入力してください',
            'title.string' => '※タイトルは文字列で入力してください',
            'area.required' => '※エリアは必須項目です。',
            'genre.required' => '※ジャンルは必須項目です。',
            'image.required' => '※最低一枚・左上の画像は必須です。',
            'image.max' => '※画像は2MB未満でお願いします',
            'image.mimes' => '※画像形式は.jpegまたは.pngで挿入してください',
            'content.max' => '※テキストは200文字以内で入力してください',
            'image1.max' => '※画像は2MB未満でお願いします',
            'image1.mimes' => '※画像形式は.jpegまたは.pngで挿入してください',
            'image2.max' => '※画像は2MB未満でお願いします',
            'image2.mimes' => '※画像形式は.jpegまたは.pngで挿入してください',
            'image3.max' => '※画像は2MB未満でお願いします',
            'image3.mimes' => '※画像形式は.jpegまたは.pngで挿入してください',
        ];
    }
}
