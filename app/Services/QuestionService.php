<?php

namespace App\Services;

use App\Models\QuestionType;
use App\Models\Subject;
use App\Repositories\QuestionRepository;
use Illuminate\Pagination\LengthAwarePaginator;

class QuestionService
{
    public function __construct(
        private readonly QuestionRepository $repository
    ) {}

    public function getAll(array $data = []): LengthAwarePaginator
    {
        return $this->repository->all($data);
    }

    public function store(array $data): void
    {
        $this->repository->create($data);
    }

    public function find(int $id)
    {
        return $this->repository->find($id);
    }

    public function update(array $data, int $id)
    {
        return $this->repository->update($data, $id);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    public function getRandomQuestions(Subject $subject, int $question_type_id, ?int $topic_id, int $questions_limit)
    {
        return $subject->questions()
            ->where('question_type_id', $question_type_id)
            ->when($topic_id, fn ($q) => $q->where('topic_id', $topic_id))
            ->with('optionsInRandomOrder')
            ->with('correctOption')
            ->inRandomOrder()
            ->limit($questions_limit)
            ->get()
            ->map(function ($question) {
                return [
                    'id' => $question->id,
                    'question' => $question->question,
                    'explanation' => $question->explanation,
                    'difficulty' => $question->difficulty,
                    'correct_option_id' => $question->correctOption?->id,
                    'options' => $question->optionsInRandomOrder->pluck('answer', 'id'),
                ];
            });
    }
}
