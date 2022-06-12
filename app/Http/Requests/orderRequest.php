<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class orderRequest extends FormRequest
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
            'fullname'          => 'required|max:255',
            'phone'             => 'required|numeric',
            'address'           => 'required|max:255',        
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Vui lòng nhập tên khách hàng',
            'phone.required'    => 'Vui lòng nhập số điện thoại khách hàng',
            'phone.numeric'     => 'Số điện thoại không hợp lệ',
            'address.required'  => 'Vui lòng nhập địa chỉ giao hàng',
            'fullname.max'      => 'Tên không được vượt quá 255 ký tự',
            'fullname.max'      => 'Địa chỉ giao hàng không được vượt quá 255 ký tự',
        ];
    }
}