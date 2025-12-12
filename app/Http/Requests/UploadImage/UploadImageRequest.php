<?php

namespace App\Http\Requests\UploadImage;

use Illuminate\Foundation\Http\FormRequest;

class UploadImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'upload' => 'required|image|max:2048',
        ];
    }
}
