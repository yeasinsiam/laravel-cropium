<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserPostRequest extends FormRequest
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
            'photo'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'username'  => ['required', 'min:5'],
            'email'     => ['required', 'email', 'unique:users'],
            'photo'     => ['required', 'image'],
            'password'  => ['required', 'min:4'],
            'password_confirmation'  => ['required', 'min:4', 'same:password'],
        ];
    }
}