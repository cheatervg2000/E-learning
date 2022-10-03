<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePassword extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'old_password' => 'required',
            'new_password' => 'required|min:8',
            'confirm_password' => 'required|min:8|required_with:new_password|same:new_password',
        ];
    }

    public function messages()
    {
        return [
            'old_password.required' => 'Mật khẩu không được chọn để trống',
            'new_password.required' => 'Mật khẩu không được chọn để trống',
            'new_password.min' => 'Mật khẩu phải từ 8 ký tự trở lên',
            'confirm_password.required' => 'Mật khẩu không được chọn để trống',
            'confirm_password.min' => 'Mật khẩu phải từ 8 ký tự trở lên',
            'confirm_password.same' => 'Mật khẩu xác nhận phải trùng với mật khẩu mới',
        ];
    }
}
