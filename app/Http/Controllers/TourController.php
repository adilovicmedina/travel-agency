<?php

namespace App\Http\Controllers;

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
            return view('tours.tours', compact('getTourList'));
        }

    public function show($id)
    {
        $tour = Tour::where('id', $id)
            ->firstOrFail();
        return view('tours.tour', compact('tour'));
    }

    public function admin_index(Request $request)
    {
         $getTourList = Tour::latest()->paginate(10);
            return view('tours.index', compact('getTourList'));
        }

    public function admin_show($id)
    {
        $tour = Tour::where('id', $id)
            ->firstOrFail();
        return view('tours.show', compact('tour'));
    }

    public function create()
    {
        return view('tours.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'location_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'country_id' => 'required',
        ]);

        Tour::create($request->all());

        return redirect()->route('tours.index')
            ->withSuccess(__('Tour created successfully.'));
    }

    public function edit(Tour $tour)
    {
        return view('tours.edit', [
            'tour' => $tour,
        ]);
    }

    public function update(Request $request, Tour $tour)
    {
        $tour->update($request->only('name', 'start_date', 'end_date'));

        return redirect()->route('tours.index')
            ->withSuccess(__('Tour updated successfully.'));
    }

    public function delete(Tour $tour)
    {
        $tour->delete();

        return redirect()->route('tours.index')
            ->withSuccess(__('Tour deleted successfully.'));
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
