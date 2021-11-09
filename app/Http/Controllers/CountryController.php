<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $getCountryList = Country::all();
        return view('country',compact('getCountryList'));
    }

    public function show($id)
    {
        $country = Country::where('id', $id)
                ->firstOrFail();
        return view ('single-country', compact('country'));
    }


    // public function showT($id)
    // {
    //     $country = Country::where('id', $id)
    //             ->firstOrFail();
    //     return view ('tour', compact('country'));
    // }
}