<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuizErrorController;

Route::get('/test', [TestController::class, 'test'])
->name('test');


Route::get('/users', [UserController::class, 'users'])
->name('users');

Route::get('/quizzes', [QuizController::class, 'quiz'])
->name('quizzes.index');

Route::get('/quizzes/{each}', [QuizController::class, 'show'])
->name('quiz.each');

Route::get('/quizzes/{id}/edit', [QuizController::class, 'edit'])
->name('quiz.edit')->middleware(['auth', 'admin']);

Route::put('/quizzes/{id}', [QuizController::class, 'update'])
->name('quiz.update')->middleware(['auth', 'admin']);

Route::delete('/quizzes/{id}', [QuizController::class, 'destroy'])
->name('quiz.destroy')->middleware(['auth','admin']);

Route::get('admin/quizzes', [QuizController::class, 'admin'])
->name('quiz.admin')->middleware(['auth','admin']);

Route::get('admin/quizzes/create', [QuizController::class, 'create'])
->name('quiz.create')->middleware(['auth','admin']);

Route::post('/quizzes', [QuizController::class, 'store'])
->name('quiz.store')->middleware(['auth','admin']);



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
