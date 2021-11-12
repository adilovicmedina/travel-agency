<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Continent;

class ContinentController extends Controller
{
    public function index()
    {
        $continents = Continent::all();
        return view('pages.continents',compact('continents'));
    }

    public function show($id)
    {
        $continent = Continent::where('id', $id)
                ->firstOrFail();
        return view ('pages.continent', compact('continent'));
    }
}
