<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Qualification\QualificationIndexRequest;
use App\Http\Requests\Qualification\QualificationStoreRequest;
use App\Http\Requests\Qualification\QualificationUpdateRequest;
use App\Services\QualificationService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class QualificationController extends Controller
{
    public function __construct(
        protected QualificationService $service
    ) {}

    public function index(QualificationIndexRequest $request): View
    {
        $qualifications = $this->service->getAll($request->validated());

        return view('admin.qualifications.index', compact('qualifications'));
    }

    public function show(int $id): View
    {
        $qualification = $this->service->find($id);

        return view('admin.qualifications.show', compact('qualification'));
    }

    public function create(): View
    {
        return view('admin.qualifications.create');
    }

    public function store(QualificationStoreRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());

        return redirect()
            ->route('qualifications.index')
            ->with('success', 'Qualification created');
    }

    public function edit(int $id): View
    {
        $qualification = $this->service->find($id);

        return view('admin.qualifications.edit', compact('qualification'));
    }

    public function update(QualificationUpdateRequest $request, $id): RedirectResponse
    {
        $this->service->update($id, $request->validated());

        return redirect()
            ->route('qualifications.index')
            ->with('success', 'Qualification updated');
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route('qualifications.index')
            ->with('success', 'Qualification deleted');
    }
}
