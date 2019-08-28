<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSongRequest extends FormRequest
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
            "name" => "required",
            'image' => 'mimes:jpeg,jpg,png,gif|max:10000',
            'audio' => 'required|mimes:mp3,mp4,mpga,wav,mpeg|max:10000'
        ];
    }
    public function messages()
    {
        $messages = [
            'name.required' => 'Vui lòng nhập tên bài hát',
            'image.mimes' => 'Định dạng file ảnh không đúng',
            'image.max' => 'Dung lượng file ảnh nhỏ hơn 10Mb',
            'audio.required' => 'Vui lòng chọn bài hát',
            'audio.mimes' => 'Định dạng file nhạc không đúng',
            'audio.max' => 'Dung lượng bài hát nhỏ hơn 10Mb'

        ];
        return $messages;
    }
}
