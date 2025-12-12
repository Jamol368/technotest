<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class QuestionUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('subject');

        return [
            'question_type_id' => 'required|integer',
            'subject_id' => 'required|integer',
            'topic_id' => 'nullable|integer',
            'question' => 'required|string',
            'explanation' => 'nullable|string',
            'difficulty' => 'nullable|integer',

            'options'        => 'required|array|size:4',
            'options.*'      => 'required|string|distinct',
            'correct_option' => 'required|integer|between:1,4',
        ];
    }
}
