<?php
namespace App\Http\Controllers;

use App\Models\Country;
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
        return view('locations.locations', compact('locations'));
    }

    public function show($id)
    {
        $location = Location::with('locations_categories')->where('id', $id)
            ->firstOrFail();
        return view('locations.location', compact('location'));
    }

    public function admin_index()
    {
        $locations = Location::latest()->paginate(10);
        return view('locations.index', compact('locations'));
    }

    public function admin_show($id)
    {
        $location = Location::with('locations_categories')->where('id', $id)
            ->firstOrFail();
        return view('locations.show', compact('location'));
    }
    public function create()
    {
        return view('locations.create',
            [
                'countries' => Country::latest()->get(),
            ]);
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
            return redirect()->route('locations.index')
                ->withSuccess(__('Location created successfully.'));

        } else {
            return redirect()->back()
                ->with('error', "Location didn't created.");

        }

    }

    public function edit(Location $location)
    {
        return view('locations.edit', [
            'location' => $location,
            'countries' => Country::latest()->get(),
        ]);
    }

    public function update(Request $request, Location $location)
    {
        $updated_location = $location->update($request->only('name', 'latitude', 'longitude', 'photo', 'country_id'));

        if ($updated_location) {
            return redirect()->route('locations.index')
                ->withSuccess(__('Location updated successfully.'));

        } else {
            return redirect()->back()
                ->with('error', "Location didn't updated.");

        }
    }

    public function delete(Location $location)
    {
        $deleted_location = $location->delete();

        if ($deleted_location) {
            return redirect()->route('locations.index')
                ->withSuccess(__('Location deleted successfully.'));

        } else {
            return redirect()->back()
                ->with('error', "Location didn't deleted.");

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
