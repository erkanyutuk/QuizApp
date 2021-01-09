<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary">Quiz Elave Et</a>
            </h5>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Quiz Adi</th>
                    <th>Status</th>
                    <th>Son Vaxti</th>
                    <th>Emeliyatlar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($quizzes as $quiz)
                    <tr>
                    <td>{{ $quiz->title}}</td>
                    <td>{{ $quiz->status}}</td>
                    <td>{{ $quiz->finished_at}}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary">Duzelis</a>
                        <a href="#" class="btn btn-sm btn-danger">Silmek</a>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$quizzes->links()}}
        </div>      
    </div>
           
</x-app-layout>
