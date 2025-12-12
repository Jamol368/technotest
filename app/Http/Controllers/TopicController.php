<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Services\TopicService;
use Illuminate\Contracts\View\View;

class TopicController extends Controller
{
    public function __construct(
        protected TopicService $topic_service
    ){}

    public function list(int $question_type_id, Subject $subject): View
    {
        $topics = $this->topic_service->getList($subject->id);

        return view('app.topics.list', compact('topics', 'question_type_id', 'subject'));
    }
}
