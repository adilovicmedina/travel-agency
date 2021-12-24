<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Continent;
use Illuminate\Http\Request;

class ContinentController extends Controller
{
    public function index()
    {
        $continents = Continent::all();

        return response()->json($continents);
    }

    public function show($id)
    {
        $continent = Continent::where('id', $id)
            ->firstOrFail();

        return response()->json($continent);
    }

    public function admin_index()
    {
        $continents = Continent::all();

        return response()->json($continents);
    }

    public function admin_show($id)
    {
        $continent = Continent::where('id', $id)
            ->firstOrFail();

        return response()->json($continent);
    }

    public function store(Request $request)
    {
        $continent = $this->validate($request, [
            'name' => 'required',
        ]);

        Continent::create($request->all());

        if ($continent) {

            return response()->json(['Result' => 'Continent created successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.'], 400);

        }
    }

    public function edit(Continent $continent)
    {
        return response()->json(['continent' => $continent]);
    }

    public function update(Request $request, Continent $continent)
    {
        $updated_continent = $continent->update($request->only('name'));

        if ($updated_continent) {

            return response()->json(['Result' => 'Continent updated successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.'], 400);

        }
    }

    public function delete(Continent $continent)
    {
        $deleted_continent = $continent->delete();

        if ($deleted_continent) {

            return response()->json(['Result' => 'Continent deleted successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.'], 400);
        }
    }
}
