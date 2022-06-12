<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class accountRequest extends FormRequest
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
            'email'       => 'required|email|max:255',
            'password'    => 'required|max:255',
        ];
    }

    public function messages()
    {
        return [
            'email.required'        => 'Vui lòng nhập email',
            'email.email'           => 'Địa chỉ email không hợp lệ',
            'email.max'             => 'Địa chỉ email không được vượt quá 255 ký tự',
            'password.required'     => 'Vui lòng nhập mật khẩu',
            'password.max'          => 'Mật khẩu không được vượt quá 255 ký tự',
        ];
    }
}
