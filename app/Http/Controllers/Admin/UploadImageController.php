<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UploadImage\UploadImageRequest;
use App\Services\UploadImageService;
use Illuminate\Http\JsonResponse;

class UploadImageController extends Controller
{
    public function __construct(
        private readonly UploadImageService $service
    ){}

    public function uploadImage(UploadImageRequest $request): JsonResponse
    {
        $path = $this->service->uploadImage($request->validated());
        return response()->json([
            'uploaded' => true,
            'url' => asset('storage/' . $path),
        ]);
    }
}
