<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Announcement\AnnouncementIndexRequest;
use App\Http\Requests\Announcement\AnnouncementStoreRequest;
use App\Http\Requests\Announcement\AnnouncementUpdateRequest;
use App\Services\AnnouncementService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AnnouncementController extends Controller
{
    public function __construct(
        protected AnnouncementService $service
    ) {}

    public function index(AnnouncementIndexRequest $request): View
    {
        $announcements = $this->service->getAll($request->validated());

        return view('admin.announcements.index', compact('announcements'));
    }

    public function show(int $id): View
    {
        $announcement = $this->service->find($id);

        return view('admin.announcements.show', compact('announcement'));
    }

    public function create(): View
    {
        return view('admin.announcements.create');
    }

    public function store(AnnouncementStoreRequest $request): RedirectResponse
    {
        $this->service->store($request->validated());

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Announcement created');
    }

    public function edit(int $id): View
    {
        $announcement = $this->service->find($id);


        return view('admin.announcements.edit', compact('announcement'));
    }

    public function update(AnnouncementUpdateRequest $request, $id): RedirectResponse
    {
        $this->service->update($id, $request->validated());

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Announcement updated');
    }

    public function destroy($id): RedirectResponse
    {
        $this->service->delete($id);

        return redirect()
            ->route('announcements.index')
            ->with('success', 'Announcement deleted');
    }
}
