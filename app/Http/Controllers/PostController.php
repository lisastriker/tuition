<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    //
    function index(){
        return view('question');
    }

    function createQuestion(){
        $post = new Post();
        $post->question = request('question');
        $post->topic = request('topic');
        if($post->image != null){
        $post->image = request('image')->store('uploads', 'public');
        }
        $updated = $post->save();
        if($updated){
            return redirect('/');
        }
    }
}
