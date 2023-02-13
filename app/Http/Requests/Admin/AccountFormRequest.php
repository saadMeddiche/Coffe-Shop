<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AccountFormRequest extends FormRequest
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
        $rules = [
            'username' => [
                'required',
                'string',
                'regex:/^[a-zA-Z\s]+$/',
            ],
            'email' => [
                'required',
                'string',
                'email',
            ],
            'new-password' => [
                'nullable',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
            ],
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'new-password.regex' => 'The password must be strong and contain at least 8 characters, one lowercase letter, one uppercase letter, one digit, and one special character (@$!%*?&).',
        ];
    }
}
