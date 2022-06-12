<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class productRequest extends FormRequest
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
            'txtBrand'          => 'required|max:255',
            'txtDescription'    => 'required|max:255',
            'txtPrice'          => 'required|numeric',
            'fileImg'           => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'txtTitle.required'         => 'Vui lòng nhập tiêu đề',
            'txtTitle.max'              => 'Tiêu đề không được vượt quá 255 ký tự',
            'txtBrand.required'         => 'Vui lòng nhập tên thương hiệu',
            'txtBrand.max'              => 'Tên thương hiệu không được vượt quá 255 ký tự',
            'txtDescription.required'   => 'Vui lòng nhập mô tả',
            'txtDescription.max'        => 'Mô tả không được vượt quá 255 ký tự',
            'txtPrice.required'         => 'Vui lòng nhập giá',
            'txtPrice.numeric'          => 'Giá không hợp lệ',
            'fileImg.required'          => 'Vui lòng chèn hình ảnh',
            'fileImg.image'             => 'File chèn vào cần phải là định dạng hình ảnh',
        ];
    }
}

