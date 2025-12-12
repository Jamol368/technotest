<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;

class NotEnoughQuestionsException extends Exception
{
    public function __construct(
        public readonly int $required,
        public readonly int $available,
        string $message = null
    ) {
        $message ??= "Savollar yetarli emas";

        parent::__construct($message, 400);
    }

    public function render($request): ?JsonResponse
    {
        if ($request->expectsJson()) {
            return response()->json([
                'success' => false,
                'message' => $this->getMessage(),
                'required' => $this->required,
                'available' => $this->available,
                'missing' => $this->required - $this->available,
            ], 400);
        }
    }
}
