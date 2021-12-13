<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Country;
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
        $country = $this->validate($request, [
            'name' => 'required',
            'continent_id' => 'required',
            'about' => 'required',
            'photo' => 'required',
        ]);
        Country::create($request->all());

        if ($country) {
            return redirect()->route('countries.index')
                ->withSuccess(__('Country created successfully.'));

        } else {
            return redirect()->back()
                ->with('error', "Country didn't create.");

        }
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
        $updated_country = $country->update($request->only('name', 'photo', 'about', 'continent_id'));

        if ($updated_country) {
            return redirect()->route('countries.index')
                ->withSuccess(__('Country updated successfully.'));

        } else {
            return redirect()->back()
                ->with('error', "Country didn't update.");

        }
    }

    public function delete(Country $country)
    {
        $deleted_country = $country->delete();

        if ($deleted_country) {
            return redirect()->route('countries.index')
                ->withSuccess(__('Country deleted successfully.'));

        } else {
            return redirect()->back()
                ->with('error', "Country didn't delete.");

        }

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
