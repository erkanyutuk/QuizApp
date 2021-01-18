<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::where('status', 'publish')->withCount('questions')->paginate(5);
        return view('dashboard', compact('quizzes'));
    }
    public function quizDetails($slug)
    {
        $quiz = Quiz::where('slug', $slug)->first() ?? abort(404, "Quiz tapılmadı");
        return view('details', compact('quiz'));
    }
}