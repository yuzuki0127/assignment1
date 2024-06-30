<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Detail</title>

    @vite('resources/js/quiz.js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$quiz->id}}, {{$quiz->name}}
        </h2>
    </x-slot>

    <body>
        <div class="mx-auto px-6">
            @foreach($quiz->Question as $question)
            <div class="mt-4 p-8 bg-white w-full rounded-2xl">
                <div class="p-4 flex justify-between">
                    <h1 class="text-lg font-semibold">
                        {{$question->text}}
                    </h1>
                    <!-- <div class="text-right">
                        <a href="{{route('quiz.edit', $quiz->id)}}">
                            <x-secondary-button>
                                編集
                            </x-secondary-button>
                        </a>
                    </div> -->
                </div>
                <hr class="w-full">
                <ul>
                    <li class="mt-2">
                        @if($question->image)
                        <img src="{{ asset('storage/' . $question->image) }}" alt="設問画像" class="mt-2" style="max-width: 200px;">
                        @endif
                        @if($question->supplement)
                        <p class="text-gray-600">補足: {{$question->supplement}}</p>
                        @endif
                    </li>
                </ul>
                <ul class="flex pt-2">
                    @foreach($question->Choice as $choice)
                    <li class="mt-2">
                        <x-primary-button class="mx-6 choice-button" data-correct="{{ $choice->is_correct }}">
                            {{$choice->text}}
                        </x-primary-button>
                    </li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </body>
</x-app-layout>

</html>
