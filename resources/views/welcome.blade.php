@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
         @foreach($posts as $post)
            <div class="card">
                <h6 href='/profile/{{$post->topic}}'>{{$post->topic}}</h6>
                <a href='/profile/{{$post->question}}' class="profile">
                <!--<img src="/storage/{{$post->image}}" height="200px" width="200px">-->
                {{$post->question}}</a>

                 <form action="{{ route('post_answer') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <input value="{{$post->id}}" name="post_id">
                    <label for="answer">Answer</label><br>
                    <textarea type="text" id="answer" name="answer" rows="10" cols="50"></textarea><br>
                    <input type="submit" value="Submit"><br>
                </form>
                
                

            </div>
          @endforeach  
        </div>
    </div>
</div>
@endsection
