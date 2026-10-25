<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Building;
use Illuminate\Http\Request;

class BuildingApiController extends Controller
{
    // GET /api/buildings
    public function index()
    {
        return Building::all();
    }

    // GET /api/buildings/{id}
    public function show(Building $building)
    {
        return $building->load('maintenanceRequests');
    }

    // POST /api/buildings  (admins with a token only)
    public function store(Request $request)
    {
        if ($request->user()->role !== 'admin') {
            abort(403, 'Admins only.');
        }

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'units' => 'required|integer|min:1',
        ]);

        $building = Building::create($data);

        return response()->json($building, 201);
    }
}