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
            return redirect()->route('user.attempts');
        } catch (\Exception $exception) {
            return view('app.errors.404', ['message' => $exception->getMessage()]);
        }
    }

    public function attempts(UserAttemptService $user_attempt_service)
    {
        $user_attempts = $user_attempt_service->getAll(['user_id' => auth()->id()]);
        return view('app.profile.attempts', ['user_attempts' => $user_attempts]);
    }
}
