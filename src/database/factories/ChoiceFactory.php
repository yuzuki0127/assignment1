<?php

namespace Database\Factories;

use App\Models\Choice;
use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChoiceFactory extends Factory
{
    protected $model = Choice::class;

    public function definition()
    {
        return [
            'text' => $this->faker->sentence(5),
            'is_correct' => false,
            'question_id' => Question::factory(),
        ];
    }
}

