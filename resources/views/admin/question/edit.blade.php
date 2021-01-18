<x-app-layout>
    <x-slot name="header">Sual üzərinde dəyisiklik</x-slot>
    <div class="card">
        <div class="card-body">
        <form method="POST" action="{{route('questions.update',[$question->quiz_id,$question->id])}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="question">Sual</label>
                <textarea type="text" class="form-control" name="question" rows="3">{{ $question->question }}</textarea>
            </div>

            <div class="form-group">
                <label for="image">Şəkil</label>
                @if ($question->image)
                <a  target="_blank" href="{{asset($question->image)}}">
                    <img src="{{asset($question->image)}}" alt="" class="img-responsive" style="width: 200px">
                </a>
                @endif
                <input type="file" class="form-control p-1" name="image" id="formFile" value="">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="answer1">1.Cavab</label>
                        <input type="text" class="form-control" name="answer1" value="{{$question->answer1 }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="answer2">2.Cavab</label>
                        <input type="text" class="form-control" name="answer2" value="{{ $question->answer2 }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="answer3">3.Cavab</label>
                        <input type="text" class="form-control" name="answer3" value="{{ $question->answer3}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="answer4">4.Cavab</label>
                        <input type="text" class="form-control" name="answer4" value="{{$question->answer4}}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="answer5">5.Cavab</label>
                        <input type="text" class="form-control" name="answer5" value="{{ $question->answer5 }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="correct_answer">Düzgün cavab</label>
                <select name="correct_answer" id="" class="form-control col-md-2">
                    <option disabled @if (old('correct_answer')==null) selected @endif value=""></option>
                    <option @if ($question->correct_answer==='answer1') selected @endif value="answer1">1.Cavab</option>
                    <option @if ($question->correct_answer==='answer2') selected @endif value="answer2">2.Cavab</option>
                    <option @if ($question->correct_answer==='answer3') selected @endif value="answer3">3.Cavab</option>
                    <option @if ($question->correct_answer==='answer4') selected @endif value="answer4">4.Cavab</option>
                    <option @if ($question->correct_answer==='answer5') selected @endif value="answer5">5.Cavab</option>
                </select>
            </div>
            <input type="submit" value="Sualı yenilə" class="btn btn-sm btn-success btn-block ">
        </form>
        </div>
    </div>
</x-app-layout>
