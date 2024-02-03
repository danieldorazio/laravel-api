<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return boolUpdateProject
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
            'title' => ['required', 'max:200', 'min:5', Rule::unique('projects')->ignore($this->project)],
            'description' => 'nullable',
            'type_id' => ['nullable', 'exists:types,id'],
            'tecnologies' => ['exists:tecnologies,id'],
            'cover_image' => ['nullable', 'image'],
        ];
    }
}
