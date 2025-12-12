<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\QuestionOption;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'question_type_id' => rand(1, 2),
            'subject_id' => rand(1, 2),
            'question' => $this->faker->text(),
            'difficulty' => rand(1, 5),
        ];
    }

    public function withOptions(int $count = 4): self
    {
        return $this->afterCreating(function (Question $question) use ($count) {
            QuestionOption::factory($count)->create([
                'question_id' => $question->id,
            ]);
        });
    }
}
