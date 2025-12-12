<?php

namespace App\Http\Requests\Textbook;

use Illuminate\Foundation\Http\FormRequest;

class TextbookIndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'per_page' => 'nullable|integer|min:1',
        ];
    }
}
