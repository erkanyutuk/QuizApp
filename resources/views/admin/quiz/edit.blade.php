<x-app-layout>
    <x-slot name="header">Quiz Uzerinde Deyisiklik</x-slot>
    <div class="card">
        <div class="card-body">
        <form method="POST" action="{{route('quizzes.update',$quiz->id)}}">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="title">Quiz Basligi</label>
                <input type="text" class="form-control" name="title" value="{{$quiz->title}}">
            </div>
            <div class="form-group">
                <label for="status">Statusu</label>
                <select name="status" id="statusSelect" class="form-control" >
                    <option class="bg-success" style="color:white" @if ($quiz->status==='publish') selected @endif value="publish" >Aktiv</option>
                    <option class="bg-warning" style="color:black"  @if ($quiz->status==='draft') selected @endif value="draft">Qaralama</option>
                    <option class="bg-danger"  style="color:white"  @if ($quiz->status==='passive') selected @endif value="passive">Passiv</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">Aciqlama</label>
                <textarea  class="form-control"  name="description" rows="4" >{{$quiz->description}}</textarea>
            </div>

            <div class="form-group">
                <input type="checkbox" @if($quiz->finished_at||old('finished_at')) checked @endif id='is_finished' >
                <label for="checkbox">Bitis tarixi elave olunsunmu?</label>
           </div>

            <div id="finished_group" @if(!$quiz->finished_at && !old('finished_at'))  style="display: none" @endif class="form-group">
                <label for="finished_at">Bitis Tarixi</label>
                <input id="finish_value" type="datetime-local" class="form-control" name="finished_at" @if($quiz->finished_at) value="{{ date('Y-m-d\TH:i',strtotime($quiz->finished_at))}}" @endif>
            </div>
            <input type="submit" value="Yadda saxla" class="btn btn-sm btn-primary btn-block">
        </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#statusSelect').change(function(){
                if($("select option:selected").val()=='publish'){
                    $('#statusSelect').css('background','green');
                    $('#statusSelect').css('color','white');
                }
                else if($("select option:selected").val()=='draft'){
                    $('#statusSelect').css('background','orange');
                    $('#statusSelect').css('color','white');

                }
                else{
                    $('#statusSelect').css('background','red');
                    $('#statusSelect').css('color','white');
                }
            });

            $('#is_finished').change(function(){
                if($('#is_finished').is(':checked')){
                    $('#finished_group').slideDown(500);
                    $('#finish_value').val('{{old('finished_at')}}');
                }else{
                    $('#finished_group').slideUp(500);
                    $('#finish_value').val('');

                }

            });
        </script>
    </x-slot>
</x-app-layout>
