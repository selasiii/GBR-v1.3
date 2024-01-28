<?php

// app/Http/Controllers/DriverController.php

namespace App\Http\Controllers;

use App\Models\Drivers;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    // List all drivers
    public function index()
    {
        $drivers = \App\Drivers::all();
        return view('admin.drivers.index', compact('drivers'));
    }

    // Show the form for creating a new driver
    public function create()
    {
        return view('admin.drivers.create');
    }

    // Store a newly created driver in the database
    public function store(Request $request)
    {
        // Validate the request

        // Create the driver
        \App\Drivers::create([
            'licence_number' => $request->input('licence_number'),
            'user_id' => $request->input('user_id'),
            // Add other fields as needed
        ]);

        // Redirect to the driver index page or show success message
        return redirect()->route('admin.drivers.index')->with('success', 'Driver created successfully');
    }

    // Display the specified driver
    public function show(\App\Drivers $driver)
    {
        return view('admin.drivers.show', compact('driver'));
    }

    // Show the form for editing the specified driver
    public function edit(\App\Drivers $driver)
    {
        return view('admin.drivers.edit', compact('driver'));
    }

    // Update the specified driver in the database
    public function update(Request $request, \App\Drivers $driver)
    {
        // Validate the request

        // Update the driver
        $driver->update([
            'licence_number' => $request->input('licence_number'),
            'user_id' => $request->input('user_id'),
            // Update other fields as needed
        ]);

        // Redirect to the driver index page or show success message
        return redirect()->route('admin.drivers.index')->with('success', 'Driver updated successfully');
    }

    // Remove the specified driver from the database
    public function destroy(\App\Drivers $driver)
    {
        $driver->delete();

        // Redirect to the driver index page or show success message
        return redirect()->route('admin.drivers.index')->with('success', 'Driver deleted successfully');
    }
}
