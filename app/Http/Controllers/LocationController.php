<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Category;

class LocationController extends Controller
{
     public function index()
    {
        $locations = Location::all();
        return view('pages.locations',compact('locations'));
    }

      public function show($id)
    {
        $location = Location::with('locations_categories')->where('id', $id)
                
                ->firstOrFail();
        return view ('pages.location', compact('location'));
    }
}
