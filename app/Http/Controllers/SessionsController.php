<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redirect;


class SessionsController extends Controller
{
    public function index(){
        return view('session.register');
    }

    public function store(){

        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = new User;
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = bcrypt(request()->password);
        $user->save();

        auth()->login($user);
            
        return redirect('/');
    }

    public function login(){
        return view('session.login');
    }

    public function login_store(){

        //  Attempt to authenticate.
        if (! auth()->attempt(request(['email', 'password']))) {
            return back();
        } // if not redirect back 
        
        // if so, sign them in
        // Redirect to hompage
        return redirect('/');
    }

    public function destroy(){
        auth()->logout(); //logout user
        return redirect('/');
    }
}











