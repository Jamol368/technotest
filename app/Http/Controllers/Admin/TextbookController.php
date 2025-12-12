<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Textbook\TextbookIndexRequest;
use App\Http\Requests\Textbook\TextbookStoreRequest;
use App\Http\Requests\Textbook\TextbookUpdateRequest;
use App\Services\TextbookService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TextbookController extends Controller
{
    public function __construct(
        protected TextbookService $service
    ) {}

    public function index(TextbookIndexRequest $request): View
    {
        $textbooks = $this->service->getAll($request->validated());

        return view('admin.textbooks.index', compact('textbooks'));
    }

    public function show(int $id): View
    {
        $textbook = $this->service->find($id);

        return view('admin.textbooks.show', compact('textbook'));
    }

    public function create(): View
    {
        return view('admin.textbooks.create');
    }

    public function store(TextbookStoreRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());

        return redirect()
            ->route('textbooks.index')
            ->with('success', 'Textbook created');
    }

    public function edit(int $id): View
    {
        $textbook = $this->service->find($id);

        return view('admin.textbooks.edit', compact('textbook'));
    }

    public function update(TextbookUpdateRequest $request, $id): RedirectResponse
    {
        $this->service->update($id, $request->validated());

        return redirect()
            ->route('textbooks.index')
            ->with('success', 'Textbook updated');
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route('textbooks.index')
            ->with('success', 'Textbook deleted');
    }
}
