<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CoffeeFormRequest extends FormRequest
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
        if (isset($_POST["Update"])) {
            $rules = [
                'name' => [
                    'required',
                    'string',
                    'max:200'
                ],
                'price' => [
                    'required',
                    'string',
                    'max:200'
                ],
                'description' => [
                    'required'
                ],
                'image' => [
                    'nullable',
                    'mimes:jpeg,jpg,png'
                ]
            ];
        } else {
            $rules = [
                'name' => [
                    'required',
                    'string',
                    'max:200'
                ],
                'price' => [
                    'required',
                    'string',
                    'max:200'
                ],
                'description' => [
                    'required'
                ],
                'image' => [
                    'required',
                    'mimes:jpeg,jpg,png'
                ]
            ];
        }


        return $rules;
    }
}
