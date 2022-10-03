<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
        $valid = [
            'name' => 'required',
            'phone' => 'required|digits:10',
            'address' => 'required',
        ];
        
        if('student.update' != $this->route()->getName())
        {
            $valid['email'] = 'required|unique:users,email|email';
            $valid['password'] = 'required|min:8';
        }
        
        return $valid;
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên học viên không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.digits' => 'Số điện thoại không hợp lệ',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'email.email' => 'Định dạng email không hợp lệ',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải từ 8 ký tự trở lên',
            'address.required' => 'Địa chỉ không được để trống',
        ];
    }
}
