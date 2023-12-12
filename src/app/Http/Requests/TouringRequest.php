<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TouringRequest extends FormRequest
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
            'day' => 'required',
            'distance' => 'required',
            'destination' => 'required|max:50',
            'content' => 'required|max:255'
        ];
    }

    public function messages()
    {
        return [
            'day.required' => '※該当する日数にチェックしてください',
            'distance.required' => '※該当するであろう走行距離にチェックしてください',
            'destination.required' => '※目的地・方面は必須です',
            'destination.max' => '※目的地・方面は50字以内で入力してください',
            'content.required' => '※待ち合わせ時間・場所、ルール等を必ず記載してください',
            'content.max' => '※下記の伝えたいことは255字以内で入力してください',
            

        ];
    }
}
