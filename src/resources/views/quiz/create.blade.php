<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quizCreate</title>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            クイズ作成
        </h2>
    </x-slot>

    <body>
        <x-message :message="session('success')" />
        <div class="max-w-7xl mx-auto px-6">
            <form action="{{ route('quiz.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mt-8">
                    <div class="w-full flex flex-col">
                        <label for="name" class="font-semibold mt-4">クイズタイトル</label>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        <input type="text" name="name" class="w-auto py-2 border border-gray-300 rounded-md" id="title" value="{{ old('name') }}">
                    </div>
                </div>

                <div id="questions-container">
                    <div class="question mt-8">
                        <div class="w-full flex flex-col">
                            <label for="questions[0][text]" class="font-semibold mt-4">設問テキスト</label>
                            <x-input-error :messages="$errors->get('questions.0.text')" class="mt-2" />
                            <input type="text" name="questions[0][text]" class="w-auto py-2 border border-gray-300 rounded-md" value="{{ old('questions.0.text') }}">
                        </div>

                        <div class="w-full flex flex-col mt-4">
                            <label for="questions[0][image]" class="font-semibold mt-4">設問画像</label>
                            <input type="file" name="questions[0][image]" class="w-auto py-2 border border-gray-300 rounded-md">
                        </div>

                        <div class="w-full flex flex-col mt-4">
                            <label for="questions[0][choices][0][text]" class="font-semibold mt-4">選択肢1</label>
                            <x-input-error :messages="$errors->get('questions.0.choices.0.text')" class="mt-2" />
                            <input type="text" name="questions[0][choices][0][text]" class="w-auto py-2 border border-gray-300 rounded-md" value="{{ old('questions.0.choices.0.text') }}">
                        </div>

                        <div class="w-full flex flex-col mt-4">
                            <label for="questions[0][choices][1][text]" class="font-semibold mt-4">選択肢2</label>
                            <x-input-error :messages="$errors->get('questions.0.choices.1.text')" class="mt-2" />
                            <input type="text" name="questions[0][choices][1][text]" class="w-auto py-2 border border-gray-300 rounded-md" value="{{ old('questions.0.choices.1.text') }}">
                        </div>

                        <div class="w-full flex flex-col mt-4">
                            <label for="questions[0][choices][2][text]" class="font-semibold mt-4">選択肢3</label>
                            <x-input-error :messages="$errors->get('questions.0.choices.2.text')" class="mt-2" />
                            <input type="text" name="questions[0][choices][2][text]" class="w-auto py-2 border border-gray-300 rounded-md" value="{{ old('questions.0.choices.2.text') }}">
                        </div>

                        <div class="w-full flex flex-col mt-4">
                            <label for="questions[0][correct_choice]" class="font-semibold mt-4">正解の選択肢</label>
                            <x-input-error :messages="$errors->get('questions.0.correct_choice')" class="mt-2" />
                            <div>
                                <label><input type="radio" name="questions[0][correct_choice]" value="1" {{ old('questions.0.correct_choice') == 1 ? 'checked' : '' }}> 1</label>
                                <label><input type="radio" name="questions[0][correct_choice]" value="2" {{ old('questions.0.correct_choice') == 2 ? 'checked' : '' }}> 2</label>
                                <label><input type="radio" name="questions[0][correct_choice]" value="3" {{ old('questions.0.correct_choice') == 3 ? 'checked' : '' }}> 3</label>
                            </div>
                        </div>
                    </div>
                </div>

                <x-secondary-button type="button" onclick="addQuestion()">設問を追加</x-secondary-button>

                <x-primary-button class="mt-4 mb-4 mx-4">
                    送信する
                </x-primary-button>
            </form>
        </div>

        <script>
            function addQuestion() {
                const questionsContainer = document.getElementById('questions-container');
                const questionCount = document.querySelectorAll('.question').length;
                const questionHtml = `
                    <div class="question mt-8">
                        <div class="w-full flex flex-col">
                            <label for="questions[${questionCount}][text]" class="font-semibold mt-4">設問テキスト</label>
                            <input type="text" name="questions[${questionCount}][text]" class="w-auto py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="w-full flex flex-col mt-4">
                            <label for="questions[${questionCount}][image]" class="font-semibold mt-4">設問画像</label>
                            <input type="file" name="questions[${questionCount}][image]" class="w-auto py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="w-full flex flex-col mt-4">
                            <label for="questions[${questionCount}][choices][0][text]" class="font-semibold mt-4">選択肢1</label>
                            <input type="text" name="questions[${questionCount}][choices][0][text]" class="w-auto py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="w-full flex flex-col mt-4">
                            <label for="questions[${questionCount}][choices][1][text]" class="font-semibold mt-4">選択肢2</label>
                            <input type="text" name="questions[${questionCount}][choices][1][text]" class="w-auto py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="w-full flex flex-col mt-4">
                            <label for="questions[${questionCount}][choices][2][text]" class="font-semibold mt-4">選択肢3</label>
                            <input type="text" name="questions[${questionCount}][choices][2][text]" class="w-auto py-2 border border-gray-300 rounded-md">
                        </div>
                        <div class="w-full flex flex-col mt-4">
                            <label for="questions[${questionCount}][correct_choice]" class="font-semibold mt-4">正解の選択肢</label>
                            <div>
                                <label><input type="radio" name="questions[${questionCount}][correct_choice]" value="1"> 1</label>
                                <label><input type="radio" name="questions[${questionCount}][correct_choice]" value="2"> 2</label>
                                <label><input type="radio" name="questions[${questionCount}][correct_choice]" value="3"> 3</label>
                            </div>
                        </div>
                    </div>
                `;
                questionsContainer.insertAdjacentHTML('beforeend', questionHtml);
            }
        </script>
    </body>
</x-app-layout>

</html>
