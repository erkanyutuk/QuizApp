<x-app-layout>
    <x-slot name="header">
        Əsas Səhifə
    </x-slot>

    <div class="row">
        <div class="col-md-8">
            <div class="list-group">
                @foreach ($quizzes as $quiz)
                <a href="{{route('quiz.details',$quiz->slug)}}" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                      <h5 class="mb-1">{{$quiz->title}}</h5>
                      <small><span class="badge badge-danger">{{$quiz->finished_at ? $quiz->finished_at->diffForHumans().' qurtarır' : null}}</span></small>


                    </div>
                    <p class="mb-1">{{Str::limit($quiz->description,150)}}</p>
                    <small class="text-muted float-right mt-2">{{$quiz->questions_count . ' ədəd sual.'}}</small>
                  </a>
                @endforeach
                {{$quizzes->links()}}
                              </div>
        </div>
        <div class="col-md-4"></div>
    </div>

</x-app-layout>
