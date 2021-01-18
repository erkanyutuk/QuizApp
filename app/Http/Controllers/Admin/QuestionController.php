<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Models\Quiz;
use App\Http\Requests\QuestionCreateRequest;
use App\Models\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $quiz = Quiz::where('id', $id)->with('questions')->first() ?? abort(404, 'Quiz Tapilmadi');
        return view('admin.question.list', compact('quiz'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $quiz = Quiz::find($id);
        return view('admin.question.create', compact('quiz'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request, $id)
    {
        if ($request->hasFile('image')) {
            $filename = Str::slug($request->question) . '.' . $request->image->extension();
            $fileNameWithUpload = 'uploads/' . $filename;
            $request->image->move(public_path('uploads'), $filename);
            $request->merge(
                ['image' => $fileNameWithUpload,]
            );
        }
        Quiz::find($id)->questions()->create($request->post());
        return redirect()->route('questions.index', $id)->withSuccess('Yeni sual əlavə edildi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id, $question_id)
    {
        $question = Quiz::find($quiz_id)->questions()->whereId($question_id)->first() ?? abort(404, "Quiz vəya Sual tapılmadı");
        return view('admin.question.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionCreateRequest $request, $quiz_id, $question_id)
    {
        if ($request->hasFile('image')) {
            $filename = Str::slug($question_id) . '.' . $request->image->extension();
            $fileNameWithUpload = 'uploads/' . $filename;
            $request->image->move(public_path('uploads'), $filename);
            $request->merge(
                ['image' => $fileNameWithUpload,]
            );
        }
        $question = Question::find($question_id) ?? abort(404, 'Sual tapilmadi');
        Quiz::find($quiz_id)->questions()->whereId($question_id)->first()->update($request->post());
        return redirect()->route('questions.index', $quiz_id)->withSuccess('Sual melumatlari yenilendi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($quiz_id, $question_id)
    {
        Quiz::find($quiz_id)->questions()->whereId($question_id)->delete();
        return redirect()->route('questions.index', $quiz_id)->withSuccess('Sual silindi');
    }
}
