<?php

namespace App\Http\Requests\Announcement;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('topic');

        return [
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'required|string',
        ];
    }
}
