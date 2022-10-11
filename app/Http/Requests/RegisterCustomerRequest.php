<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCustomerRequest extends FormRequest
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
            'name'      => ['required', 'max:255'],
            'photo'     => 'nullable|image|max:2048',
            'email'     => ['required', 'email', 'unique:customers'],
            'password'  => ['required', 'min:4'],
            'password_confirmation'  => ['required', 'min:4', 'same:password'],
        ];
    }
}