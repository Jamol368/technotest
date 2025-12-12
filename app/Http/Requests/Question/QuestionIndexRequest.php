<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class QuestionIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question_type_id' => 'nullable|integer',
            'subject_id' => 'nullable|integer',
            'topic_id' => 'nullable|integer',
            'difficulty' => 'nullable|integer',
            'per_page' => 'nullable|integer|min:1',
            'created_at_from' => 'nullable|date_format:Y-m-d|before_or_equal:created_at_to',
            'created_at_to' => 'nullable|date_format:Y-m-d|after_or_equal:created_at_from',
        ];
    }
}
