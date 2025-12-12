<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Topic\TopicIndexRequest;
use App\Http\Requests\Topic\TopicStoreRequest;
use App\Http\Requests\Topic\TopicUpdateRequest;
use App\Models\Subject;
use App\Services\SubjectService;
use App\Services\TopicService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class TopicController extends Controller
{
    public function __construct(
        protected TopicService $service,
        protected SubjectService $subject_service
    ) {}

    public function index(TopicIndexRequest $request): View
    {
        $topics = $this->service->getAll($request->validated());

        return view('admin.topics.index', compact('topics'));
    }

    public function show(int $id): View
    {
        $topic = $this->service->find($id);

        return view('admin.topics.show', compact('topic'));
    }

    public function create(): View
    {
        $subjects = $this->subject_service->getAll();

        return view('admin.topics.create', compact('subjects'));
    }

    public function store(TopicStoreRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());

        return redirect()
            ->route('topics.index')
            ->with('success', 'Topic created');
    }

    public function edit(int $id): View
    {
        $topic = $this->service->find($id);

        $subjects = $this->subject_service->getAll();

        return view('admin.topics.edit', compact('topic', 'subjects'));
    }

    public function update(TopicUpdateRequest $request, $id): RedirectResponse
    {
        $this->service->update($id, $request->validated());

        return redirect()
            ->route('topics.index')
            ->with('success', 'Topic updated');
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route('topics.index')
            ->with('success', 'Topic deleted');
    }

    public function bySubject(Subject $subject): JsonResponse
    {
        return response()->json($subject->topics()->select('id', 'name')->get());
    }
}
