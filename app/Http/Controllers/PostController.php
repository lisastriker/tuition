<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Answer;
class PostController extends Controller
{
    //
    function index(){
        $post = Post::select('topic')->whereNotNull('topic')->distinct()->get();
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
        
        if(request('image') != null){
        $post->image = request('image')->store('uploads', 'public');
        }
        $updated = $post->save();
        if($updated){
            return redirect('/');
        }
    }

    function delete(){
        $delete = Post::where('id', request('nameDEL'))->first();
    	$destinationPath = 'uploads/'; //uploads/player/
    	//File::delete($destinationPath. $delete->Image);
    	$deleted = Post::where('id', request('nameDEL'))->delete();

        $deletedAns = Answer::where('question_id', request('ansDEL'))->delete();
    	if($deleted){
    		return redirect('/');
    
        }
    }
}
