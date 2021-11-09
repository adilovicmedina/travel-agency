<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class TourController extends Controller
{
      public function index()
    {
        $getTourList = Tour::all();
        return view('tours',compact('getTourList'));
    }

    public function show($id)
    {
        $tour = Tour::where('id', $id)
                ->firstOrFail();
        return view ('tour', compact('tour'));
    }
}
