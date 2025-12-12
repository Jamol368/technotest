<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Question\QuestionIndexRequest;
use App\Http\Requests\Question\QuestionStoreRequest;
use App\Http\Requests\Question\QuestionUpdateRequest;
use App\Services\QuestionService;
use App\Services\QuestionTypeService;
use App\Services\SubjectService;
use App\Services\TopicService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QuestionController extends Controller
{
    public function __construct(
        protected QuestionService $service,
        protected QuestionTypeService $question_type_service,
        protected SubjectService $subject_service,
        protected TopicService $topic_service,
    ) {}

    public function index(QuestionIndexRequest $request): View
    {
        $questions = $this->service->getAll($request->validated());

        return view('admin.questions.index', compact('questions'));
    }

    public function show(int $id): View
    {
        $question = $this->service->find($id);

        return view('admin.questions.show', compact('question'));
    }

    public function create(): View
    {
        $question_types = $this->question_type_service->getAll();
        $subjects = $this->subject_service->getAll();
        $topics = $this->topic_service->getAll();
        return view('admin.questions.create', compact('question_types', 'subjects', 'topics'));
    }

    public function store(QuestionStoreRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());

        return redirect()
            ->route('questions.index')
            ->with('success', 'Question created');
    }

    public function edit(int $id): View
    {
        $question = $this->service->find($id);
        $options = $question->options;
        $question_types = $this->question_type_service->getAll();
        $subjects = $this->subject_service->getAll();
        $topics = $this->topic_service->getAll();

        return view('admin.questions.edit', compact('question', 'question_types', 'subjects', 'topics', 'options'));
    }

    public function update(QuestionUpdateRequest $request, $id): RedirectResponse
    {
        $this->service->update($request->validated(), $id);

        return redirect()
            ->route('questions.index')
            ->with('success', 'Question updated');
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route('questions.index')
            ->with('success', 'Question deleted');
    }
}
