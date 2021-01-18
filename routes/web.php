<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\MainController;

Route::get('/', function () {
    return view('dashboard');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('panel', [MainController::class, 'index'])->name('dashboard');
    Route::get('quiz/{slug}', [MainController::class, 'quizDetails'])->name('quiz.details');
});


Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin',], function () {
    Route::get('quizzes/{id}', [QuizController::class, 'destroy'])->whereNumber('id')->name('quizzes.destroy');
    Route::get('quiz/{quiz_id}/questions/{id}', [QuestionController::class, 'destroy'])->whereNumber('id')->name('questions.destroy');
    Route::resource('quizzes', QuizController::class);
    Route::resource('quiz/{quiz_id}/questions', QuestionController::class);
});
