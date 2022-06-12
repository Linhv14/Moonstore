<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class userRequest extends FormRequest
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
            'email'      => 'required|unique:users|email|max:255',
            'password'   => 'required|confirmed|max:255|min:6',
            'address'    => 'required|max:255',
            'city'       => 'required|max:255',
            'country'    => 'max:255',
            'phone'      => 'required|numeric',
            'agree'      => 'accepted'
        ];
    }

    public function messages()
    {
        return [
            'email.required'     => 'Vui lòng nhập địa chỉ email',
            'email.unique'       => 'Địa chỉ email này đã được sử dụng',
            'email.email'        => 'Địa chỉ email không hợp lệ',
            'email.max'          => 'Địa chỉ email không được vượt quá 255 ký tự',
            'name.required'      => 'Vui lòng nhập tên',
            'password.required'  => 'Vui lòng nhập mật khẩu',
            'address.required'   => 'Vui lòng nhập địa chỉ',
            'city.required'      => 'Vui lòng nhập thành phố',
            'phone.required'     => 'Vui lòng nhập số điện thoại',
            'phone.numeric'      => 'Số điện thoại không hợp lệ',
            'agree.accepted'     => 'Bạn cần đồng ý với chính sách của chúng tôi',
            'name.max'           => 'Tên không được vượt quá 255 ký tự',
            'password.max'       => 'Mật khẩu không được vượt quá 255 ký tự',
            'password.min'       => 'Mật khẩu cần tối thiểu 5 ký tự',
            'password.confirm'   => 'Mật khẩu không trùng khớp',
            'address.max'        => 'Địa chỉ không được vượt quá 255 ký tự',
            'city.max'           => 'Thành phố không được vượt quá 255 ký tự',
            'country.max'        => 'Quốc tịch không được vượt quá 255 ký tự',
        ];
    }

}
