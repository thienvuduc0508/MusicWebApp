<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateSingerRequest extends FormRequest
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
            "name" => "required|unique:singers,name",
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }
    public function messages()
    {
        $messages = [
            'name.required' => 'Vui lòng nhập tên ca sỹ',
            'name.unique' => 'Ca sỹ đã tồn tại',
            'image.mimes' => 'Định dạng ảnh không đúng',
            'image.max' => 'Kích thước ảnh không vượt quá 10Mb'
        ];
        return $messages;
    }
}
