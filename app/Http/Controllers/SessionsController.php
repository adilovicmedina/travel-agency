<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{

    public function create(){
        return view ('sessions.create');
    }

    public function login_store(Request $request){
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('remember')? true : false;

        if (auth()->attempt($attributes, $remember)){

            $user = auth()->user();
            session()->regenerate();
            
        }else{
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);

        }
         return redirect('/')->with('success', 'Welcome back');
    }
    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }
}
