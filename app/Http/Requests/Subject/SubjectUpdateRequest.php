<?php

namespace App\Http\Requests\Subject;

use Illuminate\Foundation\Http\FormRequest;

class SubjectUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('subject');

        return [
            'name' => 'required|string|max:255|unique:subjects,name,'.$id,
            'image' => 'nullable|image|max:2048',
            'color' => 'required|string|max:31',
            'description' => 'nullable|string',
            'is_active' => 'nullable',
        ];
    }
}
