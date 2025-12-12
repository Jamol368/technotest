<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserUpdateRequest;
use App\Models\User;
use App\Services\QualificationService;
use App\Services\SubjectService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProfileController extends Controller
{
    public function __construct(
        protected SubjectService $subject_service,
        protected QualificationService $qualification_service,
    ){}

    public function profile(User $user): View
    {
        $subjects = $this->subject_service->getAll();
        $qualifications = $this->qualification_service->getAll();

        return view('app.profile.show', compact('user', 'subjects', 'qualifications'));
    }

    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return redirect(route('profile', $user));
    }
}
