<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function __construct(
        private readonly UserRepository $userRepository
    ){}

    public function login(array $data): bool
    {
        return Auth::attempt([
            'phone'    => $data['phone'],
            'password' => $data['password'],
        ]);
    }

    public function register(array $data): User
    {
        $user = $this->userRepository->create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'subject_id' => $data['subject_id'],
            'qualification_id' => $data['qualification_id'],
            'hash' => $data['password'],
        ]);

        Auth::login($user);

        return $user;
    }

    public function logout(): void
    {
        Auth::logout();
    }
}
