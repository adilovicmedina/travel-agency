<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";

        if ($search != "") {

            $locations = Location::where('name', 'LIKE', "%$search%")
                ->paginate(5);

        } else {

            $locations = Location::paginate(5);

        }

        return response()->json($locations);
    }

    public function show($id)
    {
        $location = Location::with('locations_categories')->where('id', $id)
            ->firstOrFail();

        return response()->json($location);
    }

    public function admin_index()
    {
        return response()->json([Location::latest()->paginate(10)]);
    }

    public function admin_show($id)
    {
        $location = Location::with('locations_categories')->where('id', $id)
            ->firstOrFail();

        return response()->json($location);
    }

    public function create()
    {
        return response()->json(['countries' => Country::latest()->get()]);
    }

    public function store(Request $request)
    {
        $location = $this->validate($request, [
            'name' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'photo' => 'required',
            'country_id' => 'required',
        ]);

        Location::create($request->all());

        if ($location) {

            return response()->json(['Result' => 'Location created successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.']);

        }

    }

    public function edit(Location $location)
    {
        return response()->json([
            'location' => $location,
            'countries' => Country::latest()->get(),
        ]);
    }

    public function update(Request $request, Location $location)
    {
        $updated_location = $location->update($request->only('name', 'latitude', 'longitude', 'photo', 'country_id'));

        if ($updated_location) {

            return response()->json(['Result' => 'Location updated successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.']);

        }
    }

    public function delete(Location $location)
    {
        $deleted_location = $location->delete();

        if ($deleted_location) {

            return response()->json(['Result' => 'Location deleted successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.']);

        }
    }

    public function upload(Request $request, Location $location)
    {
        if ($request->hasFile('photo')) {

            $filename = $request->photo->getClientOriginalName();
            $request->photo->storeAs('public/images/', $filename);
            $country->update(['photo' => $filename]);

        }

        return redirect()->route('locations.edit');
    }
}
