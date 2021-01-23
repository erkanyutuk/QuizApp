<x-app-layout>
    <x-slot name='header'>{{$quiz->title}}</x-slot>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 ">
                    <form action="{{route('quiz.check',$quiz->slug)}}" method="PUT">
                        @csrf
                    @foreach ($quiz->questions as $question)
                    <strong>#{{$loop->iteration.' '}}</strong>{{$question->question}}
                    <br>
                    @if ($question->image)
                    <img src="{{asset($question->image)}}" alt="" style="width: 50%;">
                    @endif
                    <div class="form-group ml-4 mt-1">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}_1" value="answer1" required>
                        <label class="form-check-label" for="quiz{{$question->id}}_1">
                          {{$question->answer1}}
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}_2" value="answer2" required>
                        <label class="form-check-label" for="quiz{{$question->id}}_2">
                            {{$question->answer2}}
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}_3" value="answer3" required >
                        <label class="form-check-label" for="quiz{{$question->id}}_3">
                            {{$question->answer3}}
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}_4" value="answer4" required>
                        <label class="form-check-label" for="quiz{{$question->id}}_4">
                            {{$question->answer4}}
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{$question->id}}" id="quiz{{$question->id}}_5" value="answer5" required>
                        <label class="form-check-label" for="quiz{{$question->id}}_5">
                            {{$question->answer5}}
                        </label>
                      </div>
                    </div>


                    <hr>


                    @endforeach
                    <button class="btn btn-sm btn-primary form-control" type="submit">Quizi tamamla</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
