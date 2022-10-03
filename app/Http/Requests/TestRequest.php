<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TestRequest extends FormRequest
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
            'total_question' => 'required|numeric',
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Tên bài kiểm tra không được để trống',
            'description.required' => 'Mô tả không được để trống',
            'total_question.required' => 'Số lượng câu hỏi không được để trống',
            'total_question.numeric' => 'Số lượng câu hỏi phải ở dạng số',
        ];
    }
}
