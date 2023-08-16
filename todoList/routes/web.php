<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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
    $posts=[];
    $posts = Post::orderBy('created_at', 'desc')->get();
    return view('welcome',['posts'=>$posts]);
});

Route::post('/addItem', [PostController::class,'addItem']);
Route::get('/delete/{id}', [PostController::class,'deleteItem']);
Route::get('/edit/{id}', [PostController::class,'editItem']);
Route::post('/edit/{id}', [PostController::class,'editItems']);




