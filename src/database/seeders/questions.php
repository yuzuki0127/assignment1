<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class questions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Question::create([
            'image' => '',
            'text' => '1.日本のIT人材が2030年には最大どれくらい不足すると言われているでしょうか？',
            'supplement' => '',
            'quiz_id' => '1',
        ]);
        \App\Models\Question::create([
            'image' => '',
            'text' => '2.既存業界のビジネスと、先進的なテクノロジーを結びつけて生まれた、新しいビジネスのことをなんと言うでしょう？',
            'supplement' => '',
            'quiz_id' => '1',
        ]);
        \App\Models\Question::create([
            'image' => '',
            'text' => '3.IoTとは何の略でしょう？',
            'supplement' => '',
            'quiz_id' => '1',
        ]);
        \App\Models\Question::create([
            'text' => '1.出身小学校は？',
            'quiz_id' => '2',
        ]);
        \App\Models\Question::create([
            'text' => '2.動物に例えるとなんと言われることが多いでしょう？',
            'quiz_id' => '2',
        ]);
        \App\Models\Question::create([
            'text' => '3.MBTIは？',
            'quiz_id' => '2',
        ]);
    }
}
