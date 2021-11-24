<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour;

class TourController extends Controller
{
      public function index(Request $request)
    {
         $search = $request['search'] ?? "";
        if ($search != ""){
            $getTourList = Tour::where('name', 'LIKE', "%$search%")->get();
            return view('tours.tours', compact('getTourList', 'search'));
        }else{
            $getTourList = Tour::all();
             return view('tours.tours', compact('getTourList'));
         }
    }

    public function show($id)
    {
        $tour = Tour::where('id', $id)
                ->firstOrFail();
        return view ('tours.tour', compact('tour'));
    }

    public function admin_index(Request $request)
    {
         $search = $request['search'] ?? "";
        if ($search != ""){
            $getTourList = Tour::where('name', 'LIKE', "%$search%")->get();
            return view('tours.index', compact('getTourList', 'search'));
        }else{
            $getTourList = Tour::all();
             return view('tours.index', compact('getTourList'));
         }
    }

    public function admin_show($id)
    {
        $tour = Tour::where('id', $id)
                ->firstOrFail();
        return view ('tours.show', compact('tour'));
    }

    public function create()
    {
        return view('tours.create');
    }

    public function store(Request $request)
    {
        tour::create(array_merge($request->only('name', 'country_id', 'location_id', 'start_date', 'end_date')
        ));

        return redirect()->route('tours.index')
            ->withSuccess(__('Tour created successfully.'));
    }

    public function edit(Tour $tour)
    {
        return view('tours.edit', [
            'tour' => $tour
        ]);
    }

    public function update(Request $request, Tour $tour)
    {
        $tour->update($request->only('name','start_date', 'end_date'));

        return redirect()->route('tours.index')
            ->withSuccess(__('Tour updated successfully.'));
    }

    public function delete(Tour $tour)
    {
        $tour->delete();

        return redirect()->route('tours.index')
            ->withSuccess(__('Tour deleted successfully.'));
    }
}
