<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class update_userRequest extends FormRequest
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
            'name'       => 'required|max:255',         
            'address'    => 'required|max:255',
            'city'       => 'required|max:255',
            'country'    => 'max:255',
            'phone'      => 'required|numeric',
            'email'      => '',
            'password'   => '',
            'type_user'  => '',
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'Vui lòng nhập tên',
            'name.max'           => 'Tên không được vượt quá 255 ký tự',
            'address.required'   => 'Vui lòng nhập địa chỉ',
            'address.max'        => 'Địa chỉ không được vượt quá 255 ký tự',
            'city.required'      => 'Vui lòng nhập thành phố',
            'city.max'           => 'Thành phố không được vượt quá 255 ký tự',
            'phone.required'     => 'Vui lòng nhập số điện thoại',
            'phone.numeric'      => 'Số điện thoại không hợp lệ',
            'country.max'        => 'Quốc tịch không được vượt quá 255 ký tự',
        ];
    }

}
