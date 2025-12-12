<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminAuthController extends Controller
{
    public function __construct(
        private readonly AuthService $authService
    ){}

    public function showLogin(): View
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (!$this->authService->login($request->validated())) {
            return back()->withErrors(['name' => 'Invalid credentials.']);
        }

        return redirect()->intended('/admin/dashboard');
    }

    public function logout(): RedirectResponse
    {
        $this->authService->logout();

        return redirect('/admin/login');
    }
}
