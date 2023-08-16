<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function deletePost(Post $post)
    {
        
        $post->delete();
        return redirect('/');
    }
    public function updatePost(Request $request, Post $post)
    {
        
       $incomingField = $request->validate([
        'title'=>['required'],
        'body'=>['required']
        ]);

        $incomingField['title']= strip_tags($incomingField['title']);
        $incomingField['body']= strip_tags($incomingField['body']);

        $post->update($incomingField);

        return redirect('/');
    }
    public function editPost(Post $post)
    {
        
        if(auth()->user()->id != $post['user_id'])
        {
            return redirect('/');
        }
        return view('/editpost',['post'=>$post]);
    }
    public function createPost(Request $request)
    {
        $incomingField = $request->validate([
            'title'=>['required'],
            'body'=>['required']
        ]);
        $incomingField['title']= strip_tags($incomingField['title']);
        $incomingField['body']= strip_tags($incomingField['body']);

        $incomingField['user_id']= auth()->id();

        Post::create($incomingField);
        return redirect('/');
    }
}

