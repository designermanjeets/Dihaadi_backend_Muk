<?php

namespace App\Http\Controllers\API;

use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LocationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        // Create a new location entry
        $location = new Location();
        $location->user_id = Auth::id(); // Assuming the user is authenticated
        $location->latitude = $request->latitude;
        $location->longitude = $request->longitude;
        $location->created_on = now(); // Set created_on to the current timestamp
        $location->save();

        return response()->json([
            'message' => 'Location stored successfully',
            'data' => $location,
        ], 201);
    }
}
