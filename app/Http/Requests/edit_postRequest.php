<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class edit_postRequest extends FormRequest
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
            'txtDescription'    => 'required|max:255',
            'txtAuthor'         => 'required|max:255',
            'txtContent'        => 'required',
            'fileImg'           => 'image',
        ];
    }

    public function messages()
    {
        return [
            'txtTitle.required'         => 'Vui lòng nhập tiêu đề',
            'txtDescription.required'   => 'Vui lòng nhập mô tả',
            'txtAuthor.required'        => 'Vui lòng nhập tác giả',
            'txtContent.required'       => 'Vui lòng nhập nội dung',
            'txtTitle.max'              => 'Tiêu đề không được vượt quá 255 ký tự',
            'txtDescription.max'        => 'Mô tả không được vượt quá 255 ký tự',
            'txtAuthor.max'             => 'Mô tả không được vượt quá 255 ký tự',
            'fileImg.image'             => 'File chèn vào cần phải là định dạng hình ảnh',
        ];
    }
}
