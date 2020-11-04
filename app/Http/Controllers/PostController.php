<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    //
    function index(){
        $post = Post::all();
        return view('question')->with('posts', $post);
    }

    function createQuestion(){
        $post = new Post();
        $post->question = request('question');
        if(request('topicSelected') == "choose"){
            $post->topic = request('topic');
        }else{
            $post->topic = request('topicSelected');
        }
        
        if($post->image != null){
        $post->image = request('image')->store('uploads', 'public');
        }
        $updated = $post->save();
        if($updated){
            return redirect('/');
        }
    }
}
