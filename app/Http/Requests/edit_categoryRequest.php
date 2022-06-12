<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class edit_categoryRequest extends FormRequest
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
            'name'    => 'required|max:255',
            'fileImg' => 'image',
        ];
    }

    public function messages()
    {
        return [
            'name.required'  => 'Vui lòng nhập tên danh mục',
            'name.max'       => 'Tên danh mục không được vượt quá 255 ký tự',
            'fileImg.image'  => 'File chèn vào cần phải là định dạng hình ảnh',
        ];
    }
}
