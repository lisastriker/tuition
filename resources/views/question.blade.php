@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <form action="{{ route('create_question') }}" enctype="multipart/form-data" method="post">
                    @csrf
                    <label for="topic">Topic</label><br>
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
@endsection