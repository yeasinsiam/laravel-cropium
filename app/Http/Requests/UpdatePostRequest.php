<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title'                 => 'required|string',
            'thumbnail'             => 'image|max:10240|nullable',
            'excerpt'               => 'required|string',
            'content'               => 'required|string',
            'post_category_ids'     => "required|array|min:1",
            'post_category_ids.*'   => "exists:categories,id",
        ];
    }
}