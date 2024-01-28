<?php

// app/Http/Controllers/TravelController.php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\Drivers;
use App\Models\Routes;
use App\Models\Travels;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    // List all travels
    public function index()
    {
        $travels = \App\Travels::all();
        return view('admin.travels.index', compact('travels'));
    }

    // Show the form for creating a new travel
    public function create()
    {
        $drivers = \App\Drivers::all();
        $buses = \App\Bus::all();
        $routes = \App\Routes::all();
        return view('admin.travels.create', compact('drivers', 'buses', 'routes'));
    }

    // Store a newly created travel in the database
    public function store(Request $request)
    {
        // Validate the request

        // Create the travel
        \App\Travels::create([
            'route_name' => $request->input('route_name'),
            'driver_id' => $request->input('driver_id'),
            'bus_id' => $request->input('bus_id'),
            'departure_datetime' => $request->input('departure_datetime'),
            'arrival_datetime' => $request->input('arrival_datetime'),
            'travel_status' => $request->input('travel_status'),
            'route_id' => $request->input('route_id'),
            'estimated_time_of_arrival' => $request->input('estimated_time_of_arrival'),
            // Add other fields as needed
        ]);

        // Redirect to the travel index page or show success message
        return redirect()->route('admin.travels.index')->with('success', 'Travel created successfully');
    }

    // Display the specified travel
    public function show(\App\Travels $travel)
    {
        return view('admin.travels.show', compact('travel'));
    }

    // Show the form for editing the specified travel
    public function edit(\App\Travels $travel)
    {
        $drivers = \App\Drivers::all();
        $buses = \App\Bus::all();
        $routes = \App\Routes::all();
        return view('admin.travels.edit', compact('travel', 'drivers', 'buses', 'routes'));
    }

    // Update the specified travel in the database
    public function update(Request $request, \App\Travels $travel)
    {
        // Validate the request

        // Update the travel
        $travel->update([
            'route_name' => $request->input('route_name'),
            'driver_id' => $request->input('driver_id'),
            'bus_id' => $request->input('bus_id'),
            'departure_datetime' => $request->input('departure_datetime'),
            'arrival_datetime' => $request->input('arrival_datetime'),
            'travel_status' => $request->input('travel_status'),
            'route_id' => $request->input('route_id'),
            'estimated_time_of_arrival' => $request->input('estimated_time_of_arrival'),
            // Update other fields as needed
        ]);

        // Redirect to the travel index page or show success message
        return redirect()->route('admin.travels.index')->with('success', 'Travel updated successfully');
    }

    // Remove the specified travel from the database
    public function destroy(\App\Travels $travel)
    {
        $travel->delete();

        // Redirect to the travel index page or show success message
        return redirect()->route('admin.travels.index')->with('success', 'Travel deleted successfully');
    }
}
