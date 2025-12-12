<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\AuthService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(
        private readonly AuthService $authService
    ){}

    public function showLogin(): View
    {
        return view('app.auth.login');
    }

    public function login(LoginRequest $request): RedirectResponse
    {
        if (!$this->authService->login($request->validated())) {
            return back()->withErrors(['name' => 'Invalid credentials.']);
        }

        return redirect()->intended('/');
    }

    public function logout(Request $request): RedirectResponse
    {
        $this->authService->logout();

        return redirect('/login');
    }
}
