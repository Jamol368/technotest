<?php

namespace App\Services;

use App\Exceptions\NotEnoughQuestionsException;
use App\Models\QuestionType;
use App\Models\Subject;
use App\Models\Topic;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class QuizService
{
    public function __construct(
        private BalanceService     $balance_service,
        private QuestionService    $question_service,
        private UserAttemptService $user_attempt_service,
    ) {}

    public function startAttempt(QuestionType $question_type, Subject $subject, ?Topic $topic = null)
    {
        return DB::transaction(function () use ($question_type, $subject, $topic) {
            $this->balance_service->deduct($question_type->price);

            $questions_limit = $question_type->questions;
            $this->ensureEnoughQuestions($subject, $question_type->id, $topic?->id, $questions_limit);
            $questions = $this->question_service->getRandomQuestions($subject, $question_type->id, $topic?->id, $questions_limit);

            $attempt = $this->user_attempt_service->start($question_type, $subject, $topic, $questions);

            return [
                'attempt_id' => $attempt->id,
                'questions' => collect($questions)->map(fn($q) => Arr::except($q, ['correct_option_id'])),
                'question_type' => $question_type,
                'subject' => $subject,
            ];
        });
    }

    private function ensureEnoughQuestions(Subject $subject, int $type_id, ?int $topic_id, int $required): void
    {
        $available = $subject->questions()
            ->where('question_type_id', $type_id)
            ->when($topic_id, fn ($q) => $q->where('topic_id', $topic_id))
            ->count();

        if ($available < $required) {
            throw new NotEnoughQuestionsException($required, $available);
        }
    }
}
