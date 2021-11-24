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
        return view('countries.country', compact('getCountryList', 'search'));
    }

    public function show($id)
    {
        $country = Country::where('id', $id)
                ->firstOrFail();
        return view ('countries.single-country', compact('country'));
    }

    public function admin_index()
    
    {
            $getCountryList = Country::all();
        return view('countries.index', compact('getCountryList'));
    }

    public function admin_show($id)
    {
        $country = Country::where('id', $id)
                ->firstOrFail();
        return view ('countries.show', compact('country'));
    }

    public function create()
    {
        return view('countries.create');
    }

    public function store(Request $request)
    {
        Country::create(array_merge($request->only('name', 'continent_id', 'photo', 'about')
    ));

        return redirect()->route('countries.index')
            ->withSuccess(__('Country created successfully.'));
    }

    public function edit(Country $country)
    {
        return view('countries.edit', [
            'country' => $country
        ]);
    }

    public function update(Request $request, Country $country)
    {
        $country->update($request->only('name', 'photo', 'about', 'continent_id'));

        return redirect()->route('countries.index')
            ->withSuccess(__('Country updated successfully.'));
    }

    public function delete(Country $country)
    {
        $country->delete();

        return redirect()->route('countries.index')
            ->withSuccess(__('Country deleted successfully.'));
    }
}