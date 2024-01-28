<?php

// app/Http/Controllers/PassengerController.php

namespace App\Http\Controllers;

use App\Models\Passengers;
use Illuminate\Http\Request;

class PassengerController extends Controller
{
    // List all passengers
    public function index()
    {
        $passengers = \App\Passengers::all();
        return view('admin.passengers.index', compact('passengers'));
    }

    // Show the form for creating a new passenger
    public function create()
    {
        return view('admin.passengers.create');
    }

    // Store a newly created passenger in the database
    public function store(Request $request)
    {
        // Validate the request

        // Create the passenger
        \App\Passengers::create([
            'ticket_id' => $request->input('ticket_id'),
            'travel_id' => $request->input('travel_id'),
            // Add other fields as needed
        ]);

        // Redirect to the passenger index page or show success message
        return redirect()->route('admin.passengers.index')->with('success', 'Passenger created successfully');
    }

    // Display the specified passenger
    public function show(\App\Passengers $passenger)
    {
        return view('admin.passengers.show', compact('passenger'));
    }

    // Show the form for editing the specified passenger
    public function edit(\App\Passengers $passenger)
    {
        return view('admin.passengers.edit', compact('passenger'));
    }

    // Update the specified passenger in the database
    public function update(Request $request, \App\Passengers $passenger)
    {
        // Validate the request

        // Update the passenger
        $passenger->update([
            'ticket_id' => $request->input('ticket_id'),
            'travel_id' => $request->input('travel_id'),
            // Update other fields as needed
        ]);

        // Redirect to the passenger index page or show success message
        return redirect()->route('admin.passengers.index')->with('success', 'Passenger updated successfully');
    }

    // Remove the specified passenger from the database
    public function destroy(\App\Passengers $passenger)
    {
        $passenger->delete();

        // Redirect to the passenger index page or show success message
        return redirect()->route('admin.passengers.index')->with('success', 'Passenger deleted successfully');
    }
}
