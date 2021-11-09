<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Continent;

class ContinentController extends Controller
{
    public function index()
    {
        $continents = Continent::all();
        return view('continents',compact('continents'));
    }
}
