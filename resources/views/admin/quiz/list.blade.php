<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6 text-right">
                    <h5 class="card-title">
                        <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary">Quiz əlave et</a>
                    </h5>
                </div>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Quizin Adi</th>
                    <th>Sual Sayı</th>
                    <th>Statusu</th>
                    <th>Son Vaxtı</th>
                    <th>Əməliyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quizzes as $quiz)
                    <tr>
                    <td>{{ $quiz->title}}</td>
                    <td >{{ $quiz->questions_count}}</td>
                    <td class="text-center">
                        @switch($quiz->status)
                            @case('publish')
                            <span class="badge badge-success">Aktiv</span>
                                @break
                            @case('draft')
                            <span class="badge badge-warning">Qaralama</span>
                                @break
                            @case('passive')
                            <span class="badge badge-danger">Passiv</span>
                                @break


                        @endswitch
                    </td>
                    <td title="{{$quiz->finished_at}}" class="text-center">{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-'}}</td>
                    <td style="max-width: 165px">
                        <a href="{{route('questions.index',$quiz->id)}}" class="btn btn-sm btn-warning">Suallar</a>
                        <a href="{{route('quizzes.edit',$quiz->id)}}" class="btn btn-sm btn-primary">Duzelis</a>
                        <a href="{{route('quizzes.destroy',$quiz->id)}}" class="btn btn-sm btn-danger">Silmek</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$quizzes->links()}}
        </div>
    </div>

</x-app-layout>
