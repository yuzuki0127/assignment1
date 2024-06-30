<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quizEdit</title>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            クイズ編集
        </h2>
    </x-slot>

    <body>
        <x-message :message="session('success')" />
        <div class="max-w-7xl mx-auto px-6">
            <form action="{{ route('quiz.update', $quiz->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mt-8">
                    <div class="w-full flex flex-col">
                        <label for="name" class="font-semibold mt-4">クイズタイトル</label>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        <input type="text" name="name" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{ old('name', $quiz->name) }}">
                    </div>
                </div>

                <div id="questions-container">
                    @foreach($quiz->Question as $question)
                    <div class="question mt-8">
                        <div class="w-full flex flex-col">
                            <label for="questions[{{ $question->id }}][text]" class="font-semibold mt-4">設問テキスト</label>
                            <x-input-error :messages="$errors->get('questions.'.$question->id.'.text')" class="mt-2" />
                            <input type="text" name="questions[{{ $question->id }}][text]" class="w-auto py-2 border border-gray-300 rounded-md" value="{{ old('questions.'.$question->id.'.text', $question->text) }}">
                        </div>

                        <div class="w-full flex flex-col mt-4">
                            <label for="questions[{{ $question->id }}][image]" class="font-semibold mt-4">設問画像</label>
                            <input type="file" name="questions[{{ $question->id }}][image]" class="w-auto py-2 border border-gray-300 rounded-md">
                            @if ($question->image)
                            <img src="{{ asset('storage/' . $question->image) }}" alt="設問画像" class="mt-2" style="max-width: 200px;">
                            @endif
                        </div>

                        @foreach($question->Choice as $choice)
                        <div class="w-full flex flex-col mt-4">
                            <label for="questions[{{ $question->id }}][choices][{{ $choice->id }}][text]" class="font-semibold mt-4">選択肢{{ $loop->index + 1 }}</label>
                            <x-input-error :messages="$errors->get('questions.'.$question->id.'.choices.'.$choice->id.'.text')" class="mt-2" />
                            <input type="text" name="questions[{{ $question->id }}][choices][{{ $choice->id }}][text]" class="w-auto py-2 border border-gray-300 rounded-md" value="{{ old('questions.'.$question->id.'.choices.'.$choice->id.'.text', $choice->text) }}">
                        </div>
                        @endforeach

                        <div class="w-full flex flex-col mt-4">
                            <label for="questions[{{ $question->id }}][correct_choice]" class="font-semibold mt-4">正解の選択肢</label>
                            <x-input-error :messages="$errors->get('questions.'.$question->id.'.correct_choice')" class="mt-2" />
                            <div>
                                @foreach($question->Choice as $choice)
                                <label><input type="radio" name="questions[{{ $question->id }}][correct_choice]" value="{{ $choice->id }}" {{ old('questions.'.$question->id.'.correct_choice', optional($question->Choice->where('is_correct', true)->first())->id) == $choice->id ? 'checked' : '' }}> {{ $loop->index + 1 }}</label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <x-primary-button class="mt-4">
                    更新する
                </x-primary-button>
            </form>
        </div>
    </body>
</x-app-layout>