<?php

namespace App\Repositories;

use App\Filters\QuestionFilter;
use App\Models\Question;
use Illuminate\Pagination\LengthAwarePaginator;

class QuestionRepository
{
    public function all(array $data): LengthAwarePaginator
    {
        return (new QuestionFilter($data))->apply(Question::query())
            ->latest()
            ->paginate($data['per_page'] ?? 10);
    }

    public function find(int $id)
    {
        return Question::findOrFail($id);
    }

    public function create(array $data)
    {
        $question = Question::create($data);

        foreach ($data['options'] as $key => $option) {
            $question->options()->create([
                'answer' => $option,
                'is_correct' => $key == $data['correct_option'],
            ]);
        }
    }

    public function update(array $data, $id)
    {
        $question = $this->find($id);
        $question->update($data);

        foreach ($question->options as $key => $option) {
            $option->update([
                'answer' => $data['options'][$key+1],
                'is_correct' => $key+1 == $data['correct_option'],
            ]);
        }
    }

    public function delete(int $id)
    {
        return $this->find($id)->delete();
    }
}
