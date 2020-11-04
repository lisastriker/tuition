@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/welcome1.css') }}">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         @foreach($posts as $post)
            <div class="card">
            <!--display question-->
                <h4 class="topic">{{$post->topic}}</h4>
                <h3 class="question">
                <!--<img src="/storage/{{$post->image}}" height="200px" width="200px">-->
                {{$post->question}}</h3>

            <!--display answer-->
                @foreach($answers as $answer)
                    @if($answer->question_id == $post->id)
                    <h6 id="answerOption">{{$answer->answer}}</h6>
                    @endif
                @endforeach

            <!--post answer-->
                <!--<img src="{{url('/images/write.png')}}" width="45px" onclick="showAnswerBox()">-->
                <div class="answerBox">
                <form action="{{ route('post_answer')}}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input value="{{$post->id}}" name="post_id" id="post_id">
                    <label for="answer" id="answerLabel">Answer</label><br>
                    <textarea type="text" id="answer" name="answer" rows="2" cols="80"></textarea><br>
                    <input type="submit" value="Submit" id="submit"><br>
                </form>
                </div>
            </div>
          @endforeach  
        </div>
    </div>
    <div class="row justify-content-center">
    <div class="col-md-8 pag">
    {{ $posts->links() }}
    </div></div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/welcome1.js') }}"></script>
@endsection
