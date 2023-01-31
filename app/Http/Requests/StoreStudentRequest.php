<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest {

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
            'name'       => 'required|string|max:255',
            'email'      => 'required|email',
            'phone'      => 'string|max:255',
            'birth_date' => 'required|date'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'name.required'       => 'A name is required',
            'name.string'         => 'A name must be a string',
            'name.max'            => 'A name must be less than 255 characters',
            'email.required'      => 'An email is required',
            'email.email'         => 'An email must be a valid email address',
            'phone.string'        => 'A phone must be a string',
            'phone.max'           => 'A phone must be less than 255 characters',
            'birth_date.required' => 'A birth date is required',
            'birth_date.date'     => 'A birth date must be a valid date'
        ];
    }
}
