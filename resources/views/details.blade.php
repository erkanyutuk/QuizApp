<x-app-layout>
    <x-slot name='header'>{{$quiz->title}}</x-slot>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <ul class="list-group">
                        @if ($quiz->my_result!=null)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Topladığın bal
                            <span class="badge badge-info badge-pill" style="font-size: 15px">{{$quiz->my_result->point}} bal</span>
                          </li>
                          @if ($quiz->myplac>10)
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Sıralaman
                            <span class="badge badge-info badge-pill" style="font-size: 13px">{{$quiz->myplace}}</span>
                          </li>
                          @endif
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Düz / Səhv
                            <strong><span class="badge badge-success badge-pill">{{$quiz->my_result->correct}} düz</span>
                                <span class="badge badge-danger badge-pill">{{$quiz->my_result->wrong}} səhv</span>
                                </strong>
                            </li>
                        @endif

                    @if ($quiz->finished_at && $quiz->my_result==null)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Quiz bitiş tarixi
                        <span class="badge badge-danger badge-pill">{{$quiz->finished_at ? $quiz->finished_at->diffForHumans() : null}}</span>
                      </li>
                    @endif
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      Sualların sayı
                      <span class="badge badge-warning badge-pill" style="font-size: 13px">{{$quiz->questions_count}} </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                      İştirakçı sayı
                      <span class="badge badge-secondary badge-pill" style="font-size: 12px">{{count($quiz->results)}} </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Ortalama bal
                        <span class="badge badge-light badge-pill" style="font-size: 14px">{{round($quiz->details)}}
                        </span>
                      </li>
                  </ul>
                  @if ($quiz->top_ten!='[]')
                  <div class="card mt-3 mb-3">
                    <div class="card-body">
                        <h5 class="card-title"> İlk 10</h5>
                        <ul class="list-group">
                            @foreach ($quiz->top_ten as $user)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong><h5>#{{$loop->iteration}}</h5></strong>
                                <img src="
                                @if($user->user->profile_photo_path)
                                {{asset($user->profile_photo_path)}}
                                 @else
                                 {{$user->user->profile_photo_url}}
                                 @endif" alt="" style="width: 40px; height:40px; border-radius:25px;">
                                 <mark @if($user->user->id==auth()->user()->id)
                                    class="text-danger"
                                    @endif>{{$user->user->name}}</mark>

                                <span class="badge badge-pill badge-success " style="font-size: 15px"> {{$user->point}}</span>
                           </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
                  @endif

                </div>
                <div class="col-md-8">
                    <p>{{$quiz->description}}</p>
                    @if ($quiz->my_result == null)
                    @if($quiz->finished_at>now())
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-primary form-control btn-sm">Quizə keçid</a>
                    @endif
                    @else
                    <a href="{{route('quiz.join',$quiz->slug)}}" class="btn btn-dark form-control btn-sm">Quiz cavablarına baxış</a>
                    @endif
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
