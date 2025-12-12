<?php

namespace App\Http\Requests\QuestionType;

use Illuminate\Foundation\Http\FormRequest;

class QuestionTypeUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('question_type');

        return [
            'name' => 'required|string|max:63|unique:subjects,name,'.$id,
            'questions' => 'required|integer',
            'minutes' => 'required|integer',
            'point' => 'required|numeric',
            'price' => 'required|integer',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ];
    }
}
