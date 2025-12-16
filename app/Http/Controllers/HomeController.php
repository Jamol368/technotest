<?php

namespace App\Http\Controllers;

use App\Services\AnnouncementService;
use App\Services\QuestionTypeService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function __construct(
        private QuestionTypeService $question_type_service,
        private AnnouncementService $announcement_service,
    ) {}

    public function index(): View
    {
        $question_types = $this->question_type_service->getAll();
        $announcements = $this->announcement_service->getAll(['per_page' => 4]);

        return view('app.home', compact('question_types', 'announcements'));
    }
}
