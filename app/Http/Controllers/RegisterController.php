<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'username' => 'required|min:5|max:20|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:7',
        ]);

        $user = User::create($attributes);

        auth()->login($user);

        return redirect("/")->with('success', 'Your account has been created.');
    }
}
