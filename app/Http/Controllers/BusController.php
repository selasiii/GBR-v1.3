<?php
// app/Http/Controllers/BusController.php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    // List all buses
    public function index()
    {
        $buses = \App\Bus::all();
        return view('admin.buses.index', compact('buses'));
    }

    // Show the form for creating a new bus
    public function create()
    {
        return view('admin.buses.create');
    }

    // Store a newly created bus in the database
    public function store(Request $request)
    {
        // Validate the request

        // Create the bus
        \App\Bus::create([
            'bus_number' => $request->input('bus_number'),
            'capacity' => $request->input('capacity'),
            'model' => $request->input('model'),
            'make' => $request->input('make'),
            'year' => $request->input('year'),
            'color' => $request->input('color'),
            // Add other fields as needed
        ]);

        // Redirect to the bus index page or show success message
        return redirect()->route('admin.buses.index')->with('success', 'Bus created successfully');
    }

    // Display the specified bus
    public function show(\App\Bus $bus)
    {
        return view('admin.buses.show', compact('bus'));
    }

    // Show the form for editing the specified bus
    public function edit(\App\Bus $bus)
    {
        return view('admin.buses.edit', compact('bus'));
    }

    // Update the specified bus in the database
    public function update(Request $request, \App\Bus $bus)
    {
        // Validate the request

        // Update the bus
        $bus->update([
            'bus_number' => $request->input('bus_number'),
            'capacity' => $request->input('capacity'),
            'model' => $request->input('model'),
            'make' => $request->input('make'),
            'year' => $request->input('year'),
            'color' => $request->input('color'),
            // Update other fields as needed
        ]);

        // Redirect to the bus index page or show success message
        return redirect()->route('admin.buses.index')->with('success', 'Bus updated successfully');
    }

    // Remove the specified bus from the database
    public function destroy(\App\Bus $bus)
    {
        $bus->delete();

        // Redirect to the bus index page or show success message
        return redirect()->route('admin.buses.index')->with('success', 'Bus deleted successfully');
    }
}
