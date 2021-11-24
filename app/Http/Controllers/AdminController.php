<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create(){

        return view('pages.dashboard');
    }
    

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }


}
