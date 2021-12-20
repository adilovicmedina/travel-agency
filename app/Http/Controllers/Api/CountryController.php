<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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

        return response()->json($getCountryList);
    }

    public function show($id)
    {
        $country = Country::where('id', $id)
            ->firstOrFail();

        return response()->json($country);
    }

    public function admin_index()
    {
        $countries = Country::latest()->paginate(10);

        return response()->json($countries);
    }

    public function admin_show($id)
    {
        $country = Country::where('id', $id)
            ->firstOrFail();

        return response()->json($country);
    }

    public function create()
    {
        return response()->json(['continents' => Continent::latest()->get()]);
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

            return response()->json(['Result' => 'Country created successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.']);

        }
    }

    public function edit(Country $country)
    {
        return response()->json([
            'country' => $country,
            'continents' => Continent::latest()->get(),
        ]);
    }

    public function update(Request $request, Country $country)
    {
        $updated_country = $country->update($request->only('name', 'photo', 'about', 'continent_id'));

        if ($updated_country) {

            return response()->json(['Result' => 'Country updated successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.']);

        }
    }

    public function delete(Country $country)
    {
        $deleted_country = $country->delete();

        if ($deleted_country) {

            return response()->json(['Result' => 'Country deleted successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.']);
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
