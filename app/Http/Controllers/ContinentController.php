<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use Illuminate\Http\Request;

class ContinentController extends Controller
{
    public function index()
    {
        $continents = Continent::all();
        return view('continents.continents', compact('continents'));
    }

    public function show($id)
    {
        $continent = Continent::where('id', $id)
            ->firstOrFail();
        return view('continents.continent', compact('continent'));
    }

    public function admin_index()
    {
        $continents = Continent::all();
        return view('continents.index', compact('continents'));
    }

    public function admin_show($id)
    {
        $continent = Continent::where('id', $id)
            ->firstOrFail();
        return view('continents.show', compact('continent'));
    }

    public function create()
    {
        return view('continents.create');
    }

    public function store(Request $request)
    {
        $continent = $this->validate($request, [
            'name' => 'required',
        ]);
        Continent::create($request->all());

        if ($continent) {
            return redirect()->route('continents.index')
                ->withSuccess(__('Continent created successfully.'));

        } else {
            return redirect()->back()
                ->with('error', "Continent didn't created.");

        }
    }

    public function edit(Continent $continent)
    {
        return view('continents.edit', [
            'continent' => $continent,
        ]);
    }

    public function update(Request $request, Continent $continent)
    {
        $updated_continent = $continent->update($request->only('name'));

        if ($updated_continent) {
            return redirect()->route('continents.index')
                ->withSuccess(__('Continent updated successfully.'));

        } else {
            return redirect()->back()
                ->with('error', "Continent didn't updated.");

        }

    }

    public function delete(Continent $continent)
    {
        $deleted_continent = $continent->delete();

        if ($deleted_continent) {
            return redirect()->route('continents.index')
                ->withSuccess(__('Continent deleted successfully.'));

        } else {
            return redirect()->back()
                ->with('error', "Continent didn't deleted.");

        }

    }
}
