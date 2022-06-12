<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class bannerRequest extends FormRequest
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
            'txtTitle'          => 'required|max:255',
            'fileImg'           => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'txtTitle.required'         => 'Vui lòng nhập tiêu đề',
            'txtTitle.max'              => 'Tiêu đề không được vượt quá 255 ký tự',
            'fileImg.required'          => 'Vui lòng chèn hình ảnh',
            'fileImg.image'             => 'File không phải là định dạng hình ảnh',
        ];
    }
}
