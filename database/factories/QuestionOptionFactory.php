<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionOptionFactory extends Factory
{

    public function definition(): array
    {
        return [
            'question_id' => null,
            'answer'      => $this->faker->sentence(),
            'is_correct'  => rand(0, 1),
        ];
    }
}
