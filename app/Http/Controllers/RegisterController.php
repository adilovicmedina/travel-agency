<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){
        $attributes = request()->validate([
            'username' => 'required|min:5|max:20|unique:users,username', 
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:7'
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect("/")->with('success', 'Your account has been created.');
    }
}
