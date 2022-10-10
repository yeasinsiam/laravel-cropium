<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserPutRequest extends FormRequest
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
            'name'      => ['required', 'string', 'max:255'],
            'photo'     => ['image', 'max:2048', 'nullable'],
            'email'     => ['required', 'email', 'unique:users,email,' . $this->user->id],
            'password'  => ['nullable', 'min:4'],
            'password_confirmation'  => ['nullable', 'min:4', 'same:password'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'password_confirmation.same' => 'The confirm password and password must match.',
        ];
    }
}