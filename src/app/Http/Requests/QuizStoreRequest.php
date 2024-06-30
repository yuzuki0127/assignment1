<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizStoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'questions.*.text' => 'required|string|max:200',
            'questions.*.image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'questions.*.choices' => 'required|array|size:3',
            'questions.*.choices.*.text' => 'required|string|max:100',
            'questions.*.correct_choice' => 'required|integer|between:1,3',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'クイズタイトルは必須項目です。',
            'name.max' => 'クイズタイトルは100文字以内で入力してください。',
            'questions.*.text.required' => '設問のテキストは必須項目です。',
            'questions.*.text.max' => '設問のテキストは200文字以内で入力してください。',
            'questions.*.image.image' => '設問の画像は画像ファイルである必要があります。',
            'questions.*.image.mimes' => '設問の画像はjpeg, png, jpg, gif, svg形式のファイルである必要があります。',
            'questions.*.image.max' => '設問の画像は2048KB以内である必要があります。',
            'questions.*.choices.required' => '選択肢は3つ入力してください。',
            'questions.*.choices.size' => '選択肢は3つである必要があります。',
            'questions.*.choices.*.text.required' => '選択肢のテキストは必須項目です。',
            'questions.*.choices.*.text.max' => '選択肢のテキストは100文字以内で入力してください。',
            'questions.*.correct_choice.required' => '正解の選択肢を選んでください。',
            'questions.*.correct_choice.between' => '正解の選択肢は1から3の数字で入力してください。',
        ];
    }
}

