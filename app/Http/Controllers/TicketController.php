<?php

// app/Http/Controllers/TicketController.php

namespace App\Http\Controllers;

use App\Models\Tickets;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    // List all tickets
    public function index()
    {
        $tickets = \App\Tickets::all();
        return view('admin.tickets.index', compact('tickets'));
    }

    // Show the form for creating a new ticket
    public function create()
    {
        return view('admin.tickets.create');
    }

    // Store a newly created ticket in the database
    public function store(Request $request)
    {
        // Validate the request

        // Create the ticket
        \App\Tickets::create([
            'issued_date' => $request->input('issued_date'),
            'expiry_date' => $request->input('expiry_date'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'user_id' => $request->input('user_id'),
            'travel_id' => $request->input('travel_id'),
            // Add other fields as needed
        ]);

        // Redirect to the ticket index page or show success message
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket created successfully');
    }

    // Display the specified ticket
    public function show(\App\Tickets $ticket)
    {
        return view('admin.tickets.show', compact('ticket'));
    }

    // Show the form for editing the specified ticket
    public function edit(\App\Tickets $ticket)
    {
        return view('admin.tickets.edit', compact('ticket'));
    }

    // Update the specified ticket in the database
    public function update(Request $request, \App\Tickets $ticket)
    {
        // Validate the request

        // Update the ticket
        $ticket->update([
            'issued_date' => $request->input('issued_date'),
            'expiry_date' => $request->input('expiry_date'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
            'user_id' => $request->input('user_id'),
            'travel_id' => $request->input('travel_id'),
            // Update other fields as needed
        ]);

        // Redirect to the ticket index page or show success message
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket updated successfully');
    }

    // Remove the specified ticket from the database
    public function destroy(\App\Tickets $ticket)
    {
        $ticket->delete();

        // Redirect to the ticket index page or show success message
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket deleted successfully');
    }
}
