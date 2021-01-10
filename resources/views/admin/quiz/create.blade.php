<x-app-layout>
    <x-slot name="header">Yeni Quiz</x-slot>
    <div class="card">
        <div class="card-body">
        <form method="POST" action="{{route('quizzes.store')}}">
            @csrf
            <div class="form-group">
                <label for="title">Quiz Basligi</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="description">Aciqlama</label>
                <textarea  class="form-control"  name="description" rows="4" >{{old('description')}}</textarea>
            </div>

            <div class="form-group">
                <input type="checkbox" @if(old('finished_at')) checked @endif id='is_finished' >
                <label for="checkbox">Bitis tarixi elave olunsunmu?</label>
           </div>

            <div id="finished_group" @if(!old('finished_at'))  style="display: none" @endif class="form-group">
                <label for="finished_at">Bitis Tarixi</label>
                <input type="datetime-local" class="form-control" name="finished_at" value="{{old('finished_at')}}">
            </div>
            <input type="submit" value="Quiz Yarat" class="btn btn-sm btn-success btn-block">
        </form>
        </div>
    </div>
    <x-slot name="js">
        <script>
            $('#is_finished').change(function(){
                if($('#is_finished').is(':checked')){
                    $('#finished_group').slideDown(500);
                }else{
                    $('#finished_group').slideUp(500);
                }

            });
        </script>
    </x-slot>
</x-app-layout>
