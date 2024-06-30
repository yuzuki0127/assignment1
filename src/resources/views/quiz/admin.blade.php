<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin-quiz</title>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            adminクイズ一覧表示
        </h2>
    </x-slot>

    <body>
        <x-message :message="session('success')" />
        <div class="mx-auto px-6">
            @foreach($quiz as $quizzes)
            <div class="mt-4 p-8 bg-white w-full rounded-2xl {{ $quizzes->trashed() ? 'bg-gray-200' : '' }}">
                <div class="p-4 flex justify-between">
                    <h1 class="text-lg font-semibold {{ $quizzes->trashed() ? 'text-gray-500' : '' }}">
                        <a href="{{ route('quiz.each', $quizzes->id) }}" class="{{ $quizzes->trashed() ? 'pointer-events-none' : '' }}">
                            {{$quizzes->id}}, {{$quizzes->name}}
                        </a>
                    </h1>
                    <div class="text-right flex gap-6">
                        @if(!$quizzes->trashed())
                        <a href="{{route('quiz.edit', $quizzes->id)}}">
                            <x-secondary-button>
                                編集
                            </x-secondary-button>
                        </a>
                        @endif
                        <form action="{{ route('quiz.destroy', $quizzes->id) }}" method="POST" onsubmit="return confirm('本当に削除しますか？');">
                            @csrf
                            @method('DELETE')
                            <x-danger-button>
                                削除
                            </x-danger-button>
                        </form>
                    </div>
                </div>
                <hr class="w-full">
            </div>
            @endforeach
        </div>
        <div class="pt-4 py-6 px-6">
            {{$quiz->links()}}
        </div>
    </body>
</x-app-layout>

</html>
