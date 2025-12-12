<?php

namespace App\Http\Requests\Textbook;

use Illuminate\Foundation\Http\FormRequest;

class TextbookUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'file' => 'nullable|file|max:2048|mimes:pdf',
            'title' => 'required|string',
        ];
    }
}
