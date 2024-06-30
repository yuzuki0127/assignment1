<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;

class choices extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = Question::all();
        //
        \App\Models\Choice::create([
            'question_id' => $questions[0] -> id,
            'text' => '約79万人',
            'is_correct' => 1,
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[0] -> id,
            'text' => '約28万人',
            'is_correct' => '0',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[0] -> id,
            'text' => '約183万人',
            'is_correct' => '0',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[1] -> id,
            'text' => 'INTECH',
            'is_correct' => '0',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[1] -> id,
            'text' => 'BIZZTECH',
            'is_correct' => '0',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[1] -> id,
            'text' => 'IX-TECH',
            'is_correct' => '1',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[2] -> id,
            'text' => 'Internet of Things',
            'is_correct' => '1',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[2] -> id,
            'text' => 'Information on Tool',
            'is_correct' => '0',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[2] -> id,
            'text' => 'Integrate into Technology',
            'is_correct' => '0',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[3] -> id,
            'text' => '三原志知小学校',
            'is_correct' => '0',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[3] -> id,
            'text' => '西淡志知小学校',
            'is_correct' => '1',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[3] -> id,
            'text' => '志知小学校',
            'is_correct' => '0',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[4] -> id,
            'text' => '犬',
            'is_correct' => '1',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[4] -> id,
            'text' => '猫',
            'is_correct' => '0',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[4] -> id,
            'text' => 'レッサーパンダ',
            'is_correct' => '1',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[5] -> id,
            'text' => 'ISFJ',
            'is_correct' => '0',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[5] -> id,
            'text' => 'ESFJ',
            'is_correct' => '0',
        ]);
        \App\Models\Choice::create([
            'question_id' => $questions[5] -> id,
            'text' => 'ENTJ',
            'is_correct' => '1',
        ]);
    }
}
