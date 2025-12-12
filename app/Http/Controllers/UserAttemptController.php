<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAttempt\UserAttemptSubmitRequest;
use App\Services\UserAttemptService;

class UserAttemptController extends Controller
{
    public function submit(UserAttemptSubmitRequest $request, UserAttemptService $user_attempt_service)
    {
        try {
            $user_attempt_service->submitAttempt($request->validated());
            return redirect()->route('home');
        } catch (\Exception $exception) {
            return view('app.errors.404', ['message' => $exception->getMessage()]);
        }
    }
}
