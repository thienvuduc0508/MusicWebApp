<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'required|min:2|max:20',
            'dob' => 'required|date|before:today',
            'gender' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }
    public function messages()
    {
        $messages = [
            'name.required' => 'Họ tên không được để trống',
            'name.min' => 'Họ tên phải lớn hơn hai ký tự',
            'name.max' => 'Họ tên không vượt quá hai mươi ký tự',
            'dob.required' => 'Ngày sinh không được để trống',
            'dob.date' => 'Ngày sinh phải đúng định dạng',
            'dob.before' => 'Ngày sinh phải trước ngày hiện tại',
            'gender.required' => "Giới tính không được để trống",
            'image.mimes' => 'Định dạng file ảnh không đúng',
            'image.max' => 'Dung lượng file ảnh nhỏ hơn 10Mb'
        ];
        return $messages;
    }
}
