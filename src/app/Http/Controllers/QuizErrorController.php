<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\quizzes;


class QuizErrorController extends Controller
{
    public function admin() {
        $quiz = quizzes::all();
        return view('quiz.admin', compact('quiz'));
    }
}
