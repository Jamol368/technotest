<?php

namespace App\Http\Requests\Topic;

use Illuminate\Foundation\Http\FormRequest;

class TopicUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('topic');

        return [
            'name' => 'required|string|max:255|unique:qualifications,name,' . $id,
            'subject_id' => 'required|exists:subjects,id',
        ];
    }
}
