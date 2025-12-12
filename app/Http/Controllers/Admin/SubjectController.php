<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subject\SubjectIndexRequest;
use App\Http\Requests\Subject\SubjectStoreRequest;
use App\Http\Requests\Subject\SubjectUpdateRequest;
use App\Services\SubjectService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SubjectController extends Controller
{
    public function __construct(
        protected SubjectService $service
    ) {}

    public function index(SubjectIndexRequest $request): View
    {
        $subjects = $this->service->getAll($request->validated());

        return view('admin.subjects.index', compact('subjects'));
    }

    public function show(int $id): View
    {
        $subject = $this->service->find($id);

        return view('admin.subjects.show', compact('subject'));
    }

    public function create(): View
    {
        return view('admin.subjects.create');
    }

    public function store(SubjectStoreRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject created');
    }

    public function edit(int $id): View
    {
        $subject = $this->service->find($id);

        return view('admin.subjects.edit', compact('subject'));
    }

    public function update(SubjectUpdateRequest $request, $id): RedirectResponse
    {
        $this->service->update($id, $request->validated());

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject updated');
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route('subjects.index')
            ->with('success', 'Subject deleted');
    }
}
