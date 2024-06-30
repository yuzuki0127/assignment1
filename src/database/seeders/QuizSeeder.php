<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Quiz;
use App\Models\Question;
use App\Models\Choice;

class QuizSeeder extends Seeder
{
    public function run()
    {
        Quiz::factory()->count(50)->create()->each(function ($quiz) {
            Question::factory()->count(3)->create(['quiz_id' => $quiz->id])->each(function ($question) {
                $choices = Choice::factory()->count(3)->create(['question_id' => $question->id]);

                // 1つの選択肢を正解に設定
                $choices->random()->update(['is_correct' => true]);
            });
        });
    }
}



