<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Continent;
use Illuminate\Http\Request;



class CountryController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";
        if ($search != "") {
            $getCountryList = Country::where('name', 'LIKE', "%$search%")
                ->paginate(2);
        } else {
            $getCountryList = Country::paginate(2);
        }
        return view('countries.country', compact('getCountryList', 'search'));
    }

    public function show($id)
    {
        $country = Country::where('id', $id)
            ->firstOrFail();
        return view('countries.single-country', compact('country'));
    }

    public function admin_index()
    {
      $getCountryList = Country::latest()->paginate(10);
        return view('countries.index', compact('getCountryList'));
    }

    public function admin_show($id)
    {
        $country = Country::where('id', $id)
            ->firstOrFail();
        return view('countries.show', compact('country'));
    }

    public function create()
    {
        return view('countries.create',
                    [
                    'continents' => Continent::latest()->get(),
                    ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'continent_id' => 'required',
            'about' => 'required',
            'photo' => 'required',
        ]);
        Country::create($request->all());

        return redirect()->route('countries.index')
            ->withSuccess(__('Country created successfully.'));

    }

    public function edit(Country $country)
    {
        return view('countries.edit', [
            'country' => $country,
            'continents' => Continent::latest()->get(),
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

    public function upload(Request $request, Country $country)
    {
        if ($request->hasFile('photo')) {
            $filename = $request->photo->getClientOriginalName();

            $request->photo->storeAs('public/images/', $filename);
            $country->update(['photo' => $filename]);
        }
        return redirect()->route('countries.edit');
    }

}
