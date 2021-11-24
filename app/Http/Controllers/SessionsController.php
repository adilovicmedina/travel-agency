<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use AuthenticatesUsers;

class SessionsController extends Controller
{

    protected function authenticated(Request $request, $user)
    {
        // to admin dashboard
        if($user->isAdmin()) {
            return redirect(route('/dashboard'));
        }

        // to user dashboard
        else if($user->isUser()) {
            return redirect(route('/'));
        }

        abort(404);
    }


    public function create(){
        return view ('sessions.create');
    }

    public function store(Request $request){
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $remember = $request->has('remember')? true : false;

        if (auth()->attempt($attributes, $remember)){
            if (auth()->check()){
                 if (auth()->user()->isAdmin()){
                return redirect('/dashboard')->with('success', 'ADMIN!');
                }
            }
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
