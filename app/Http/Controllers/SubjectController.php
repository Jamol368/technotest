<?php

namespace App\Http\Controllers;

use App\Services\SubjectService;
use Illuminate\Contracts\View\View;

class SubjectController extends Controller
{
    public function __construct(
        protected SubjectService $subject_service
    ){}

    public function index(int $question_type_id): View
    {
        $subjects = $this->subject_service->getAll();

        return view('app.subjects.index', compact('subjects', 'question_type_id'));
    }
}
