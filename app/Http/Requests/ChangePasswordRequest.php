<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChangePasswordRequest extends FormRequest
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
            'new_password' => 'required|string|min:6|confirmed',
            'current_password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required' => 'Mật khẩu không được để trống',
            'new_password.required' => 'Mật khẩu không được để trống',
            'new_password.min' => 'Mật khẩu lớn hơn 6 kí tự ',
            'new_password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ];
    }
}
