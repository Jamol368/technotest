<?php

namespace App\Http\Requests\Qualification;

use Illuminate\Foundation\Http\FormRequest;

class QualificationUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('qualification');

        return [
            'name' => 'required|string|max:255|unique:qualifications,name,' . $id,
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ];
    }
}
