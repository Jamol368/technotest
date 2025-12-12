<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserIndexRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Services\QualificationService;
use App\Services\SubjectService;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function __construct(
        protected UserService $service,
        protected SubjectService $subject_service,
        protected QualificationService $qualification_service,
    ) {}

    public function index(UserIndexRequest $request): View
    {
        $users = $this->service->getAll($request->validated());
        $subjects = $this->subject_service->getAll();
        $qualifications = $this->qualification_service->getAll();

        return view('admin.users.index', compact('users', 'subjects', 'qualifications'));
    }

    public function show(int $id): View
    {
        $user = $this->service->find($id);

        return view('admin.users.show', compact('user'));
    }

    public function edit(int $id): View
    {
        $user = $this->service->find($id);
        $qualifications = $this->qualification_service->getAll();
        $subjects = $this->subject_service->getAll();

        return view('admin.users.edit', compact('user', 'qualifications', 'subjects'));
    }

    public function update(UserUpdateRequest $request, $id): RedirectResponse
    {
        $this->service->update($request->validated(), $id);

        return redirect()
            ->route('users.index')
            ->with('success', 'User updated');
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route('users.index')
            ->with('success', 'User deleted');
    }
}
