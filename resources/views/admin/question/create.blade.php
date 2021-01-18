<x-app-layout>
    <x-slot name="header">{{$quiz->title}}  üçün yeni sual əlavə edin</x-slot>
    <div class="card">
        <div class="card-body">
        <form method="POST" action="{{route('questions.store',$quiz->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="question">Sual</label>
                <textarea type="text" class="form-control" name="question" value="{{ old('question') }}" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Şəkil</label>
                <input type="file" class="form-control p-1" name="image" id="formFile" value="{{old('image')}}">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="answer1">1.Cavab</label>
                        <input type="text" class="form-control" name="answer1" value="{{ old('answer1') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="answer2">2.Cavab</label>
                        <input type="text" class="form-control" name="answer2" value="{{ old('answer2') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="answer3">3.Cavab</label>
                        <input type="text" class="form-control" name="answer3" value="{{ old('answer3') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="answer4">4.Cavab</label>
                        <input type="text" class="form-control" name="answer4" value="{{ old('answer4') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="answer5">5.Cavab</label>
                        <input type="text" class="form-control" name="answer5" value="{{ old('answer5') }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="correct_answer">Düzgün cavab</label>
                <select name="correct_answer" id="" class="form-control col-md-2">
                    <option disabled @if (old('correct_answer')==null) selected @endif value=""></option>
                    <option @if (old('correct_answer')==='answer1') selected @endif value="answer1">1.Cavab</option>
                    <option @if (old('correct_answer')==='answer2') selected @endif value="answer2">2.Cavab</option>
                    <option @if (old('correct_answer')==='answer3') selected @endif value="answer3">3.Cavab</option>
                    <option @if (old('correct_answer')==='answer4') selected @endif value="answer4">4.Cavab</option>
                    <option @if (old('correct_answer')==='answer5') selected @endif value="answer5">5.Cavab</option>
                </select>
            </div>
            <input type="submit" value="Sual əlavə et" class="btn btn-sm btn-success btn-block ">
        </form>
        </div>
    </div>
</x-app-layout>
