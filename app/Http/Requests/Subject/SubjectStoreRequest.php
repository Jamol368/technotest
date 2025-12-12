<?php

namespace App\Http\Requests\Subject;

use Illuminate\Foundation\Http\FormRequest;

class SubjectStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255|unique:qualifications,name',
            'image' => 'required|image|max:2048',
            'color' => 'required|string|max:31',
            'description' => 'nullable|string',
            'is_active' => 'nullable',
        ];
    }
}
