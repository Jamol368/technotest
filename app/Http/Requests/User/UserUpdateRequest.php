<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->route('user');

        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'subject_id' => 'required|integer',
            'qualification_id' => 'required|integer',
            'balance' => 'nullable|integer',
        ];
    }
}
