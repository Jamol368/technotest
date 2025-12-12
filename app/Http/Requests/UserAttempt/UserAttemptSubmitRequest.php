<?php

namespace App\Http\Requests\UserAttempt;

use Illuminate\Foundation\Http\FormRequest;

class UserAttemptSubmitRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'attempt_id' => 'required|exists:user_attempts,id,user_id,' . auth()->id(),
            'answers'    => 'required|array',
            'answers.*'  => 'required|string',
        ];
    }
}
