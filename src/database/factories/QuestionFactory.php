<?php

namespace Database\Factories;

namespace Database\Factories;

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
    protected $model = Question::class;

    public function definition()
    {
        return [
            'image' => $this->faker->optional()->imageUrl(),
            'text' => $this->faker->sentence(10),
            'supplement' => $this->faker->optional()->sentence(5),
            'quiz_id' => Quiz::factory(),
        ];
    }
}

