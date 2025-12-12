<?php

namespace App\Http\Requests\Qualification;

use Illuminate\Foundation\Http\FormRequest;

class QualificationStoreRequest extends FormRequest
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
            'description' => 'nullable|string',
        ];
    }
}
