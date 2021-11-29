<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CookieController extends Controller
{
     public function setCookie(Request $request) {
        $cookie = Cookie::queue(Cookie::make('name', $request->test, 10));
        return view('/');
   }
   public function getCookie(Request $request) {
     $val = Cookie::get('name');
      echo $val;
   }
}
