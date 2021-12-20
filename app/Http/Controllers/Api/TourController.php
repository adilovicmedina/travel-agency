<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Location;
use App\Models\Tour;
use Illuminate\Http\Request;

class TourController extends Controller
{
    public function index(Request $request)
    {
        $search = $request['search'] ?? "";

        if ($search != "") {

            $getTourList = Tour::where('name', 'LIKE', "%$search%")
                ->paginate(5);

        } else {

            $getTourList = Tour::paginate(5);

        }

        return response()->json($getTourList);
    }

    public function show($id)
    {
        $tour = Tour::where('id', $id)
            ->firstOrFail();

        return response()->json($tour);
    }

    public function admin_index(Request $request)
    {
        return Tour::latest()->paginate(10);
    }

    public function admin_show($id)
    {
        $tour = Tour::where('id', $id)
            ->firstOrFail();

        return response()->json($tour);
    }

    public function create()
    {
        return response()->json([
            'countries' => Country::latest()->get(),
            'locations' => Location::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'country_id' => 'required',
            'price' => 'required',
            'price_for_children' => 'required',
        ]);

        $name = $request->name;
        $location_id = $request->location_id;
        $start_date = date("Y-m-d", strtotime($request->start_date));
        $end_date = date("Y-m-d", strtotime($request->end_date));
        $country_id = $request->country_id;
        $price = $request->price;
        $price_for_children = $request->price_for_children;
        $special_name = explode(",", $request->special_name);
        $special_price = explode(",", $request->special_price);

        for ($i = 0; $i < count($special_name); $i++) {

            $special_wishes[] = ['name' => $special_name[$i], 'price' => $special_price[$i]];

        }

        $special_wishes_serialize = serialize($special_wishes);

        $tour = Tour::create([
            'name' => $name,
            'location_id' => $location_id,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'country_id' => $country_id,
            'price' => $price,
            'price_for_children' => $price_for_children,
            'special_wishes' => $special_wishes_serialize,
        ]);

        if ($tour) {

            return response()->json(['Result' => 'Tour created successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.'], 400);

        }
    }

    public function edit(Tour $tour)
    {
        return response()->json([
            'tour' => $tour,
            'countries' => Country::latest()->get(),
            'locations' => Location::latest()->get(),
        ]);
    }

    public function update(Request $request, Tour $tour)
    {
        $updated_tour = $tour->update($request->only('name', 'start_date', 'end_date', 'country_id', 'location_id', 'special_wishes'));

        if ($updated_tour) {

            return response()->json(['Result' => 'Tour updated successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.'], 400);

        }
    }

    public function delete(Tour $tour)
    {
        $deleted_tour = $tour->delete();

        if ($deleted_tour) {

            return response()->json(['Result' => 'Tour deleted successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.'], 400);

        }
    }

    public function upload(Request $request, Tour $tour)
    {
        if ($request->hasFile('photo')) {

            $filename = $request->photo->getClientOriginalName();

            $request->photo->storeAs('public/images/', $filename);
            $country->update(['photo' => $filename]);

        }

        return redirect()->route('tours.edit');
    }

}