<?php

namespace App\Http\Controllers;

use App\Exceptions\InsufficientBalanceException;
use App\Exceptions\NotEnoughQuestionsException;
use App\Models\QuestionType;
use App\Models\Subject;
use App\Models\Topic;
use App\Services\QuizService;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
    public function __construct(
        protected QuizService $quiz_service,
    ){}

    public function test(QuestionType $question_type, Subject $subject, ?Topic $topic = null)
    {
        try {
            $result = $this->quiz_service->startAttempt($question_type, $subject, $topic);
            return view('app.questions.test', compact('question_type', 'subject', 'topic', 'result'));
        } catch (InsufficientBalanceException|NotEnoughQuestionsException $e) {
            return view('app.errors.404', ['message' => $e->getMessage()]);
        }
    }
}
