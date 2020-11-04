<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;

class AnswerController extends Controller
{
    //COntinue here tired alrdy
    function postAnswer(){
        $answer = new Answer();
        $answer->question_id = request('post_id');
        $answer->answer = request('answer');

        $answer->save();

    }
}

//DB::table('post')->join('question', 'id', '=', 'post.id')
//->join('answer', 'user_id', '=', 'answer.user_id')
//->select('')