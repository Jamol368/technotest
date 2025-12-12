<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\AuthService;
use App\Services\QualificationService;
use App\Services\SubjectService;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
    public function __construct(
        private readonly AuthService $auth_service,
        private readonly SubjectService $subject_service,
        private readonly QualificationService $qualification_service,
    ){}

    public function showRegistration(): View
    {
        $subjects = $this->subject_service->getAll();
        $qualifications = $this->qualification_service->getAll();

        return view('app.auth.register', compact('subjects', 'qualifications'));
    }

    public function register(RegisterRequest $request): RedirectResponse
    {
        $this->auth_service->register($request->validated());

        return redirect()->route('home')->with('success', 'Registration successful!');
    }
}
