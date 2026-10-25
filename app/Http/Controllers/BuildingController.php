<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    // Show the list of buildings
    public function index()
    {
        $buildings = Building::all();

        return view('buildings', ['buildings' => $buildings]);
    }

    // Show one building and its maintenance requests
    public function show(Building $building)
    {
        $building->load('maintenanceRequests');

        return view('building-show', ['building' => $building]);
    }

    // Show the empty form
    public function create()
    {
        return view('building-create');
    }

    // Receive the submitted form and save it
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'units' => 'required|integer|min:1',
        ]);

        Building::create($data);

        return redirect('/buildings');
    }

    // Show the form filled with an existing building
    public function edit(Building $building)
    {
        return view('building-edit', ['building' => $building]);
    }

    // Save changes to an existing building
    public function update(Request $request, Building $building)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'units' => 'required|integer|min:1',
        ]);

        $building->update($data);

        return redirect('/buildings');
    }

    // Delete a building
    public function destroy(Building $building)
    {
        $building->delete();

        return redirect('/buildings');
    }
}