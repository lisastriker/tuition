@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/question1.css') }}">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <label for="topic">Choose from list</label>

                    <!--Drop down menu-->

                <button onclick="addTopic()" id="addTopicButton">+ Add topic</button>
                <h6 id="or">OR</h6>
                <form action="{{ route('create_question') }}" enctype="multipart/form-data" method="post">
                    @csrf
                     <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Topics</label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="topicSelected">
                        <option selected value="choose">Choose</option>
                            @foreach($posts as $post)
                            <option value="{{$post->topic}}" >{{$post->topic}}</option>
                            @endforeach
                        </select>
                    </div>
    
                    <label>Custom Topic</label>
                    <input type="text" id="topic" name="topic" size="30"><br>
                    <label for="question">Question</label><br>
                    <textarea type="text" id="question" name="question" rows="10" cols="50"></textarea><br>
                    <label for="image">Upload Picture</label><br>
                        <input type="file" name="image" id="image">
                     <input type="submit" value="Submit"><br>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{ mix('js/app.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/question1.js') }}"></script>
@endsection