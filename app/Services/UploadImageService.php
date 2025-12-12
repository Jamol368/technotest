<?php

namespace App\Services;

class UploadImageService
{
    public function uploadImage(array $data)
    {
        return $data['upload']->store('editor', 'public');
    }
}
