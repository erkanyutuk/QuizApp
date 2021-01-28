<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Quiz;
use Illuminate\Http\Request;
use App\Models\Results;

class MainController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::where('status', 'publish')->where(function ($query) {
            $query->whereNull('finished_at')->orWhere('finished_at', '>', now());
        })->withCount('questions')->paginate(5);
        return view('dashboard', compact('quizzes'));
    }
    public function quizDetails($slug)
    {
        $quiz = Quiz::where('slug', $slug)->with('my_result', 'top_ten.user')->withCount('questions')->first() ?? abort(404, "Quiz tapılmadı");
        return view('details', compact('quiz'));
    }
    public function quiz($slug)
    {
        $quiz = Quiz::where('slug', $slug)->with('questions.myAnswer', 'my_result',)->first() ?? abort(404, "Quiz tapılmadı");
        if ($quiz->my_result) {
            return view('result', compact('quiz'));
        }

        return view('quiz', compact('quiz'));
    }
    public function check(Request $request, $slug)
    {

        $correct = 0;
        $wrong = 0;
        $quiz = Quiz::where('slug', $slug)->with('questions')->first() ?? abort(404, "Quiz tapılmadı");
        foreach ($quiz->questions as $question) {
            if ($request->post($question->id) == null)
                abort(403, 'Bir xeta meydana gəldi');
            Answer::create([
                'user_id' => auth()->user()->id,
                'question_id' => $question->id,
                'answer' => $request->post($question->id),
            ]);

            if ($question->correct_answer === $request->post($question->id)) {
                $correct++;
            } else {
                $wrong++;
            }
        }

        $point = round((100 / count($quiz->questions)) * $correct);
        Results::create([
            'user_id' => auth()->user()->id,
            'quiz_id' => $quiz->id,
            'point' => $point,
            'correct' => $correct,
            'wrong' => $wrong
        ]);


        return redirect()->route('quiz.details', $slug)->withSuccess('Təbriklər! Quizi ' . $point . ' bal ilə bitirdiniz.');
    }
}
