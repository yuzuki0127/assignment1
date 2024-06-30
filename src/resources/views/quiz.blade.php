<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quiz</title>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            クイズ一覧表示
        </h2>
    </x-slot>

    <body>
        <!-- @if (session('success'))
        <div class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded">
            {{ session('success') }}
        </div>
        @endif -->
        <x-message :message="session('success')" />
        <div class="mx-auto px-6">
            @foreach($quiz as $quizzes)
            <div class="mt-4 p-8 bg-white w-full rounded-2xl" href="">
                <div class="p-4 flex justify-between">
                    <h1 class="text-lg font-semibold">
                        <a href="{{ route('quiz.each', $quizzes->id) }}">
                            {{$quizzes->id}}, {{$quizzes->name}}
                        </a>
                    </h1>
                </div>
                <hr class="w-full">
                <!-- <h2>
                    {{$quizzes->created_at}}
                </h2> -->
            </div>
            @endforeach
        </div>
        <div class="pt-4 py-6 px-6">
            {{$quiz->links()}}
        </div>
    </body>
</x-app-layout>

</html>
