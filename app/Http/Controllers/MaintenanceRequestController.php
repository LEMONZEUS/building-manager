<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\MaintenanceRequest;
use Illuminate\Http\Request;

class MaintenanceRequestController extends Controller
{
    // Save a new request for one building
    public function store(Request $request, Building $building)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $building->maintenanceRequests()->create($data);

        return redirect('/buildings/' . $building->id);
    }

    // Mark a request as resolved
    public function resolve(MaintenanceRequest $maintenanceRequest)
    {
        $maintenanceRequest->update(['status' => 'resolved']);

        return redirect('/buildings/' . $maintenanceRequest->building_id);
    }
}