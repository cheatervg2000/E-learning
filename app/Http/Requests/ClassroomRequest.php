<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomRequest extends FormRequest
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
            'name' => 'required|unique:classrooms,name',
            'total_student' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên lớp không được để trống',
            'name.unique' => 'Tên lớp đã tồn tại',
            'total_student.required' => 'Số lượng không được để trống',
            'total_student.numeric' => 'Số lượng phải ở dạng số',
        ];
    }
}
