<?php

namespace App\Services;

use App\Models\Question;
use App\Models\QuestionType;
use App\Models\Subject;
use App\Models\Topic;
use App\Models\UserAttempt;
use App\Repositories\UserAttemptRepository;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class UserAttemptService
{
    public function __construct(
        private UserAttemptRepository $repository
    ) {}

    public function getAll(array $data = []): LengthAwarePaginator
    {
        return $this->repository->all($data);
    }

    public function delete(int $id)
    {
        return $this->repository->delete($id);
    }

    public function start(QuestionType $type, Subject $subject, ?Topic $topic, Collection $questions): UserAttempt {

        return UserAttempt::create([
            'user_id'          => auth()->user()->id,
            'question_type_id' => $type->id,
            'subject_id'       => $subject->id,
            'topic_id'         => $topic?->id,
            'questions'        => $questions->pluck('id')->toArray(),
            'options'          => $questions->mapWithKeys(function ($q) {
                                      return [
                                          $q['id'] => collect($q['options'])->keys()->values()->toArray()
                                      ];
                                  })->toArray(),
            'true_answers'     => $questions->pluck('correct_option_id', 'id')->toArray(),
            'answers'          => [],
            'started_at'       => now(),
        ]);
    }

    public function submitAttempt(array $data)
    {
        return DB::transaction(function () use ($data) {
            $attempt = UserAttempt::query()->where('user_id', auth()->user()->id)
                ->where('id', $data['attempt_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($attempt->finished_at) {
                throw new \Exception('Test oldin yakunlangan');
            }

            $user_answers = $data['answers'];
            $true_answers = $attempt->true_answers;
            $total = count($true_answers);
            $correct_count = 0;
            $user_answers_index = 1;
            $user_answers_json = [];

            foreach ($true_answers as $question_id => $correct_option_id) {
                $user_answer = (int)($user_answers[$user_answers_index++] ?? null);
                $user_answers_json[$question_id] = $user_answer;
                if($user_answer === $correct_option_id) {
                    $correct_count++;
                }
            }

            $score = round(($correct_count / $total) * 100, 2);

            return $attempt->update([
                'answers'      => $user_answers_json,
                'score'        => $score,
                'correct_count'=> $correct_count,
                'finished_at'  => now(),
            ]);
        });
    }

    public function getUserAttempt(int $id)
    {
        $model = $this->repository->find($id)->toArray();
        $question_type = QuestionType::query()->findOrFail($model['question_type_id']);
        $subject = Subject::query()->findOrFail($model['subject_id']);

        $questions = Question::whereIn('id', $model['questions'])
            ->with('options:id,question_id,answer')
            ->get()
            ->keyBy('id');

        $user_attempt = collect($model['questions'])->map(function ($questionId) use ($model, $questions) {

            $question = $questions[$questionId];
            $optionIds = $model['options'][$questionId];
            $correctId = $model['true_answers'][$questionId] ?? null;
            $userChoice = $model['answers'][$questionId] ?? null;

            $isCorrect = $userChoice !== null && $userChoice === $correctId;

            $optionsById = $question->options->keyBy('id');

            $options = collect($optionIds)->map(function ($optionId) use (
                $optionsById,
                $correctId,
                $userChoice,
                $isCorrect
            ) {
                return [
                    'id'          => $optionId,
                    'answer'        => $optionsById[$optionId]->answer ?? '',
                    'is_true'     => $isCorrect && $optionId === $correctId,
                    'is_selected' => $optionId === $userChoice
                ];
            });

            return [
                'id'       => $question->id,
                'question' => $question->question,
                'explanation' => $question->explanation,
                'options'  => $options->values(),
                'is_correct' => $isCorrect,
            ];
        })->values();

        return [
            'user_attempt' => $user_attempt,
            'question_type' => $question_type,
            'subject' => $subject,
        ];
    }
}
