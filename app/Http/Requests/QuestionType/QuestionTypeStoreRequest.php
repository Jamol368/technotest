<?php

namespace App\Http\Requests\QuestionType;

use Illuminate\Foundation\Http\FormRequest;

class QuestionTypeStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:63|unique:qualifications,name',
            'questions' => 'required|integer',
            'minutes' => 'required|integer',
            'point' => 'required|numeric',
            'price' => 'required|integer',
            'image' => 'required|image|max:2048',
            'description' => 'nullable|string',
        ];
    }
}
