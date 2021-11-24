<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Continent;

class ContinentController extends Controller
{
    public function index()
    {
        $continents = Continent::all();
        return view('continents.continents',compact('continents'));
    }

    public function show($id)
    {
        $continent = Continent::where('id', $id)
                ->firstOrFail();
        return view ('continents.continent', compact('continent'));
    }

    public function admin_index()
    {
        $continents = Continent::all();
        return view('continents.index',compact('continents'));
    }

    public function admin_show($id)
    {
        $continent = Continent::where('id', $id)
        ->firstOrFail();
return view ('continents.show', compact('continent'));
    }

    public function create()
    {
        return view('continents.create');
    }

    public function store(Request $request)
    {
        Continent::create(array_merge($request->only('name')
        ));

        return redirect()->route('continents.index')
            ->withSuccess(__('Continent created successfully.'));
    }

    public function edit(Continent $continent)
    {
        return view('continents.edit', [
            'continent' => $continent
        ]);
    }

    public function update(Request $request, Continent $continent)
    {
        $continent->update($request->only('name'));

        return redirect()->route('continents.index')
            ->withSuccess(__('Continent updated successfully.'));
    }

    public function delete(Continent $continent)
    {
        $continent->delete();

        return redirect()->route('continents.index')
            ->withSuccess(__('Continent deleted successfully.'));
    }
}
