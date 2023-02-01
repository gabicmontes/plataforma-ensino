<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEnrollmentRequest extends FormRequest
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
            'student_id' => 'exists:students,id',
            'course_id'  => 'exists:courses,id'
        ];
    }

    public function messages()
    {
        return [
            'student_id.exists' => 'The student does not exist.',
            'course_id.exists'  => 'The course does not exist.'
        ];
    }
}
