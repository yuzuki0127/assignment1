<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class quizzes extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \App\Models\Quiz::create([
            'name' => 'ITクイズ',
        ]);
        \App\Models\Quiz::create([
            'name' => 'MYクイズ',
        ]);
    }
}
