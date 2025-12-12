<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserAttempt\UserAttemptIndexRequest;
use App\Services\QuestionTypeService;
use App\Services\SubjectService;
use App\Services\UserAttemptService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserAttemptController extends Controller
{
    public function __construct(
        protected UserAttemptService $service,
        protected QuestionTypeService $question_type_service,
        protected SubjectService $subject_service,
    ) {}

    public function index(UserAttemptIndexRequest $request): View
    {
        $user_attempts = $this->service->getAll($request->validated());
        $question_types = $this->question_type_service->getAll();
        $subjects = $this->subject_service->getAll();

        return view('admin.user_attempts.index', compact('user_attempts', 'question_types', 'subjects'));
    }


    public function destroy($id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route('user-attempts.index')
            ->with('success', 'User-attempt deleted');
    }
}
