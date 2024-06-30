<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuizStoreRequest;
use App\Http\Requests\QuizEditRequest;

use App\Models\Question;
use App\Models\Choice;
use Illuminate\Http\Request;
use App\Models\Quiz;

use function PHPUnit\Framework\returnSelf;
use Illuminate\Support\Facades\Storage;

class QuizController extends Controller
{
    public function quiz()
    {
        // $question = Question::all();
        $quiz = Quiz::paginate(20);
        return view('quiz', compact('quiz'));
    }

    public function admin()
    {
        // $quiz = Quiz::all();
        $quiz = Quiz::withTrashed()->paginate(20);
        // dd($quiz);
        return view('quiz.admin', compact('quiz'));
    }


    public function show($id)
    {
        $quiz = Quiz::with('Question.Choice')->findOrFail($id); // クイズに関連する質問を一緒に取得
        return view('quiz.each', compact('quiz'));
    }

    public function edit($id)
    {
        $quiz = Quiz::with('Question.Choice')->findOrFail($id);
        return view('quiz.edit', compact('quiz'));
    }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required|string',
    //     ]);

    //     $quiz = Quiz::findOrFail($id);
    //     $quiz->name = $request->input('name');
    //     $quiz->save();

    //     return redirect()->route('quiz.admin')->with('success', 'クイズが更新されました。');
    // }

    // QuizController.php

    public function update(QuizEditRequest $request, $id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->name = $request->input('name');
        $quiz->save();

        // 質問の更新
        foreach ($request->input('questions') as $questionId => $questionData) {
            $question = Question::findOrFail($questionId);
            $question->text = $questionData['text'];

            if (isset($request->file("questions")[$questionId]["image"]) && $request->file("questions")[$questionId]["image"]->isValid()) {
                // 既存の画像を削除
                // if ($question->image) {
                //     Storage::disk('public')->delete($question->image);
                // }
                // 新しい画像を保存
                // dd($request->file("questions")[$questionId]["image"]);
                $question->image = $request->file("questions")[$questionId]["image"]->store('images', 'public');
            }

            $question->save();

            // 選択肢の更新
            foreach ($questionData['choices'] as $choiceId => $choiceData) {
                $choice = Choice::findOrFail($choiceId);
                $choice->text = $choiceData['text'];
                $choice->is_correct = $choiceId == $questionData['correct_choice'];
                $choice->save();
            }
        }

        return redirect()->route('quiz.admin')->with('success', 'クイズが更新されました。');
    }


    // public function destroy($id) {
    //     $quiz = Quiz::with('Question.Choice')->findOrFail($id);

    //     foreach ($quiz->questions as $question) {
    //         foreach ($question->choices as $choice) {
    //             $choice->delete();
    //         }
    //         $question->delete();
    //     }

    //     $quiz->delete();

    //     return redirect()->route('Quiz.index')->with('success', 'クイズが削除されました。');
    // }

    public function create()
    {
        $quizzes = Quiz::all();
        return view('quiz.create', compact('quizzes'));
    }


    public function store(QuizStoreRequest $request)
    {
        $quiz = Quiz::create([
            'name' => $request->input('name'),
        ]);

        foreach ($request->input('questions')as $questionId => $questionData) {
            $imagePath = isset($request->file("questions")[$questionId]["image"]) ? $request->file("questions")[$questionId]["image"]->store('images', 'public') : null;
            // dd($request->file("questions")[$questionId]["image"]);
            // dd($questionData);

            $question = $quiz->Question()->create([
                'text' => $questionData['text'],
                'image' => $imagePath,
                'supplement' => $questionData['supplement'] ?? null,
            ]);

            foreach ($questionData['choices'] as $index => $choiceData) {
                $question->Choice()->create([
                    'text' => $choiceData['text'],
                    'is_correct' => $index + 1 == $questionData['correct_choice'],
                ]);
            }
        }

        return redirect()->route('quiz.admin')->with('success', 'クイズが作成されました。');
    }
}
