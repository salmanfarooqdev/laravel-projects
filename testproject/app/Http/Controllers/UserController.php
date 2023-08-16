<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function logingIn(Request $request)
    {
        $incomingFields = $request->validate([
            'loginname'=>['required'],
            'loginpassword'=>['required']
        ]);
        if(Auth::attempt(['name' => $incomingFields['loginname'], 'password' => $incomingFields['loginpassword']]))
        {

            $request->session()->regenerate(); //regerate a session 
            return redirect('/');
        }
        else
        {
            return redirect('/login')->withErrors(['login'=>'Invalid login credentials. Please try again.']);
        }
        
    }
    public function login()
    {
        
        return view('login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/login'); 
    }
    public function register(Request $request)  // send register data to database 
    {
        $incomingFields = $request->validate([
            'name'=> ['required','min:3','max:30',Rule::unique('users', 'name')],
            'email'=> ['required','email',Rule::unique('users','email')],
            'password'=>['required']
        ]);

        $incomingFields['password']= bcrypt($incomingFields['password']);
        $user =  User::create($incomingFields);
        auth()->login($user);

        // or

        // $user = new User(); // Create a new User instance
        // $user->name = $incomingFields['name'];
        // $user->email = $incomingFields['email'];
        // $user->password = bcrypt($incomingFields['password']);
        // $user->save(); // Save the user to the database
        // auth()->login($user);


        return redirect('/');
    }
}
