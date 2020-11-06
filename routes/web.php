<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Answer;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts = Post::paginate(5);
    $answers = Answer::all();
    return view('welcome', ['posts'=> $posts, 'answers'=>$answers]);
});

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/add_question', [App\Http\Controllers\PostController::class, 'index'])->name('add_question');
Route::post('/add_question',  [App\Http\Controllers\PostController::class, 'createQuestion'])->name('create_question');
Route::post('/post_answer', [App\Http\Controllers\AnswerController::class, 'postAnswer'])->name('post_answer');
Route::post('/delete',[App\Http\Controllers\PostController::class, 'delete'])->name('delete_post');