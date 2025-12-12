<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionType\QuestionTypeIndexRequest;
use App\Http\Requests\QuestionType\QuestionTypeStoreRequest;
use App\Http\Requests\QuestionType\QuestionTypeUpdateRequest;
use App\Services\QuestionTypeService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QuestionTypeController extends Controller
{
    public function __construct(
        protected QuestionTypeService $service
    ) {}

    public function index(QuestionTypeIndexRequest $request): View
    {
        $question_types = $this->service->getAll($request->validated());

        return view('admin.question_types.index', compact('question_types'));
    }

    public function show(int $id): View
    {
        $question_type = $this->service->find($id);

        return view('admin.question_types.show', compact('question_type'));
    }

    public function create(): View
    {
        return view('admin.question_types.create');
    }

    public function store(QuestionTypeStoreRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());

        return redirect()
            ->route('question-types.index')
            ->with('success', 'Question-type created');
    }

    public function edit(int $id): View
    {
        $question_type = $this->service->find($id);

        return view('admin.question_types.edit', compact('question_type'));
    }

    public function update(QuestionTypeUpdateRequest $request, $id): RedirectResponse
    {
        $this->service->update($id, $request->validated());

        return redirect()
            ->route('question-types.index')
            ->with('success', 'Question-type updated');
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route('question-types.index')
            ->with('success', 'Question type deleted');
    }
}
