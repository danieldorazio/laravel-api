<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
            'title' => ['required', 'max:200', 'min:5', 'unique:projects'],
            'description' => 'nullable',
            'type_id' => ['nullable', 'exists:types,id'],
            'tecnologies' => ['exists:tecnologies,id'],
            'cover_image' => ['nullable', 'image'],
        ];
    }
}
