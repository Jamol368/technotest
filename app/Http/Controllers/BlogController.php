<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserUpdateRequest;
use App\Models\Announcement;
use App\Models\User;
use App\Services\AnnouncementService;
use App\Services\QualificationService;
use App\Services\SubjectService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class BlogController extends Controller
{
    public function __construct(
        protected AnnouncementService $announcement_service,
    ){}

    public function index(): View
    {
        $announcements = $this->announcement_service->getAll(['per_page' => 6]);

        return view('app.blog.index', compact('announcements'));
    }

    public function show(int $id): View
    {
        $announcement = $this->announcement_service->getAndIncrementReadCount($id);

        return view('app.blog.show', compact('announcement'));
    }
}
