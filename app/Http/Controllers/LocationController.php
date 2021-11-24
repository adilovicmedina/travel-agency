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
        $locations = Location::all();
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
        return view('locations.create');
    }

    public function store(Request $request)
    {
        Location::create(array_merge($request->only('name', 'latitude', 'longitude', 'photo', 'country_id')));

        return redirect()
            ->route('locations.index')
            ->withSuccess(__('Location created successfully.'));
    }

    public function edit(Location $location)
    {
        return view('locations.edit', ['location' => $location]);
    }

    public function update(Request $request, Location $location)
    {
        $location->update($request->only('name', 'latitude', 'longitude', 'photo', 'country_id'));

        return redirect()
            ->route('locations.index')
            ->withSuccess(__('Location updated successfully.'));
    }

    public function delete(Location $location)
    {
        $location->delete();

        return redirect()
            ->route('locations.index')
            ->withSuccess(__('location deleted successfully.'));
    }
}

