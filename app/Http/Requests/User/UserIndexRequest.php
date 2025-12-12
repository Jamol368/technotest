<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'nullable|string',
            'phone' => 'nullable|string',
            'subject' => 'nullable|string',
            'qualification' => 'nullable|string',
            'per_page' => 'nullable|integer|min:1',
            'created_at_from' => 'nullable|date_format:Y-m-d|before_or_equal:created_at_to',
            'created_at_to' => 'nullable|date_format:Y-m-d|after_or_equal:created_at_from',
        ];
    }
}
