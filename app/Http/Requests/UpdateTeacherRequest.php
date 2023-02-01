<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTeacherRequest extends FormRequest
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
            'name'     => 'string|max:255',
            'email'    => 'string|email|max:255|unique:users',
            'password' => 'string|min:8',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.string'       => 'The name must be a string',
            'name.max'          => 'The name must be less than 255 characters',
            'email.string'      => 'The email must be a string',
            'email.email'       => 'The email must be a valid email',
            'email.max'         => 'The email must be less than 255 characters',
            'email.unique'      => 'The email must be unique',
            'password.string'   => 'The password must be a string',
            'password.min'      => 'The password must be at least 8 characters',
        ];
    }
}
