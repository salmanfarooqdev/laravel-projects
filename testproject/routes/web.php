<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

    $post = [];
    if(Auth()->check()) //checks if logged in 
    {   
        $user = auth()->user();
        $post = $user->userCoolPosts()->latest()->get();  // with relationship of hasMany

        //or

        // $user = auth()->user();
        // $post = Post::where('user_id', $user->id)->latest()->get(); // without relationship
    }
    return view('index',['posts'=> $post]);
});
//user controller
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/login', [UserController::class, 'login']);
Route::post('/login', [UserController::class, 'logingIn']);

//post controller
Route::post('/create-post',[PostController::class,'createPost']);
Route::get('/edit-post/{post}', [PostController::class, 'editPost']);
Route::put('/edit-post/{post}', [PostController::class, 'updatePost']);
Route::delete('/delete-post/{post}', [PostController::class, 'deletePost']);
