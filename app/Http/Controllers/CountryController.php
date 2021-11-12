<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index(Request $request)
    
    {
        $search = $request['search'] ?? "";
        if ($search != ""){
            $getCountryList = Country::where('name', 'LIKE', "%$search%")
                                        ->paginate(2);
        }else{
            $getCountryList = Country::paginate(2);
         }
        return view('pages.country', compact('getCountryList', 'search'));
    }

    public function show($id)
    {
        $country = Country::where('id', $id)
                ->firstOrFail();
        return view ('pages.single-country', compact('country'));
    }
}