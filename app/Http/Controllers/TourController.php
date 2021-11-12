<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class TourController extends Controller
{
      public function index(Request $request)
    {
         $search = $request['search'] ?? "";
        if ($search != ""){
            $getTourList = Tour::where('name', 'LIKE', "%$search%")->get();
            return view('pages.tours', compact('getTourList', 'search'));
        }else{
            $getTourList = Tour::all();
             return view('pages.tours', compact('getTourList'));
         }
    }

    public function show($id)
    {
        $tour = Tour::where('id', $id)
                ->firstOrFail();
        return view ('pages.tour', compact('tour'));
    }
}
