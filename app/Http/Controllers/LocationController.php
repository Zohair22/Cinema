<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\RedirectResponse;

class LocationController extends Controller
{
    public function store() : RedirectResponse
    {
        Location::create([
            'name' => request('locationName'),
            'address' => request('address'),
        ]);
        return back()->with(['success' => 'Location Added Successfully']);
    }

    public function delete($id) : RedirectResponse
    {
        $location = Location::findOrFail($id);
        $location->delete();
        return back()->with(['success' => 'Location Deleted Successfully']);
    }
}
