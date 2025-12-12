<?php

namespace App\Services;

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

            foreach ($true_answers as $question_id => $correct_option_id) {
                $user_answer = $user_answers[$user_answers_index++] ?? null;
                if($user_answer == $correct_option_id) {
                    $correct_count++;
                }
            }

            $score = round(($correct_count / $total) * 100, 2);

            return $attempt->update([
                'answers'      => $user_answers,
                'score'        => $score,
                'correct_count'=> $correct_count,
                'finished_at'  => now(),
            ]);
        });
    }
}
