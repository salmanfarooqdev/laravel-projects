<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function addItem(Request $request)
    {
        $incomingFields= $request->validate([
            'name'=> ['required']
        ]);

        Post::create($incomingFields);
        return redirect('/');
    }

    public function deleteItem(Post $post, $id)
    {
        $d= Post::find($id);
        $post->destroy($id);
        return redirect('/');
    }
    public function editItems(Request $request, Post $post, $id)
    {
        $incomingFields= $request->validate([
            'name'=> ['required']
        ]);

        // $user = new User(); // Create a new User instance
        // $user->name = $incomingFields['name'];
        // $user->email = $incomingFields['email'];
        // $user->password = bcrypt($incomingFields['password']);
        // $user->save(); // Save the user to the database
        // auth()->login($user);
        $post = Post::find($id);
        $post->name = $incomingFields['name'];
        $post->save();
        return redirect('/');
       
    }

    public function editItem($id)
    {
        $d = Post::find($id);

        return view('edit-list',['post'=>$d]);
    }
}
