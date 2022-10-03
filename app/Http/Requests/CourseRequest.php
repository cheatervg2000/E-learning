<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên học viên không được để trống',
            'description.required' => 'Mô tả không được để trống',
            'start_date.required' => 'Ngày bắt đầu không được để trống',
            'end_date.required' => 'Ngày kết thúc không được để trống',
            'end_date.after' => 'Ngày kết thúc phải sau ngày bắt đầu đầu',
        ];
    }
}
