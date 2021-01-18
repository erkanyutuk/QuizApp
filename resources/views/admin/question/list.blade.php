<x-app-layout>
    <x-slot name="header">{{$quiz->title}} quizinə aid suallar.</x-slot>

    <div class="card">
        <div class="card-body">

            <h5 class="card-title float-left">
                <a href="{{route('quizzes.index')}}" class="btn btn-sm btn-secondary">Quizlərə qayıt</a>
            </h5>

            <h5 class="card-title float-right">
                <a href="{{route('questions.create',$quiz->id)}}" class="btn btn-sm btn-primary">Sual əlavə et</a>
            </h5>


            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Sual</th>
                    <th>Şəkil</th>
                    <th>1.cavab</th>
                    <th>2.cavab</th>
                    <th>3.cavab</th>
                    <th>4.cavab</th>
                    <th>5.cavab</th>
                    <th>Düz cavab</th>
                    <th style="min-width: 120px">Əməliyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quiz->questions as $question)
                    <tr>
                        <td>{{ $question->question}}</td>
                        <td>
                            @if ($question->image)
                            <div class="bg-secondary p-2">
                                <a href="{{asset($question->image)}}" target="blank" style="color:white">baxış</a></div>
                            @endif
                        </td>
                        <td>{{ $question->answer1}}</td>
                        <td>{{ $question->answer2}}</td>
                        <td>{{ $question->answer3}}</td>
                        <td>{{ $question->answer4}}</td>
                        <td>{{ $question->answer5}}</td>
                        <td class="text-success">{{ substr($question->correct_answer,-1)}}</td>

                        <td style="min-width: 100px" class="text-center">
                            <a href="{{route('questions.edit',[$quiz->id,$question->id])}}" class="btn btn-sm btn-primary mb-1" style="min-width: 65px"><i class="far fa-edit"></i>Duzelis</a>
                            <br>
                            <a href="{{route('questions.destroy',[$quiz->id,$question->id])}}" class="btn btn-sm btn-danger" style="min-width: 65px">Silmek</a>
                        </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</x-app-layout>
