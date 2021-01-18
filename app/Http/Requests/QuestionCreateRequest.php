<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestionCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'image|nullable|file|max:1024|mimes:jpg,png,jpeg',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required',
            'answer5' => 'required',
            'correct_answer' => 'required',
        ];
    }
    public function attributes()
    {
        return [
            'question' => 'Sual',
            'image' => 'Şəkil',
            'answer1' => '1.Cavab',
            'answer2' => '2.Cavab',
            'answer3' => '3.Cavab',
            'answer4' => '4.Cavab',
            'answer5' => '5.Cavab',
            'correct_answer' => 'Düzgün cavab',
        ];
    }
}
