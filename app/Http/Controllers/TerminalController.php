<?php

// app/Http/Controllers/TerminalController.php

namespace App\Http\Controllers;

use App\Models\Terminals;
use Illuminate\Http\Request;

class TerminalController extends Controller
{
    // List all terminals
    public function index()
    {
        $terminals = \App\Terminals::all();
        return view('admin.terminals.index', compact('terminals'));
    }

    // Show the form for creating a new terminal
    public function create()
    {
        return view('admin.terminals.create');
    }

    // Store a newly created terminal in the database
    public function store(Request $request)
    {
        // Validate the request

        // Create the terminal
        \App\Terminals::create([
            'terminal_name' => $request->input('terminal_name'),
            'location' => $request->input('location'),
            'region' => $request->input('region'),
            'staff_id' => $request->input('staff_id'),
            // Add other fields as needed
        ]);

        // Redirect to the terminal index page or show success message
        return redirect()->route('admin.terminals.index')->with('success', 'Terminal created successfully');
    }

    // Display the specified terminal
    public function show(\App\Terminals $terminal)
    {
        return view('admin.terminals.show', compact('terminal'));
    }

    // Show the form for editing the specified terminal
    public function edit(\App\Terminals $terminal)
    {
        return view('admin.terminals.edit', compact('terminal'));
    }

    // Update the specified terminal in the database
    public function update(Request $request, \App\Terminals $terminal)
    {
        // Validate the request

        // Update the terminal
        $terminal->update([
            'terminal_name' => $request->input('terminal_name'),
            'location' => $request->input('location'),
            'region' => $request->input('region'),
            'staff_id' => $request->input('staff_id'),
            // Update other fields as needed
        ]);

        // Redirect to the terminal index page or show success message
        return redirect()->route('admin.terminals.index')->with('success', 'Terminal updated successfully');
    }

    // Remove the specified terminal from the database
    public function destroy(\App\Terminals $terminal)
    {
        $terminal->delete();

        // Redirect to the terminal index page or show success message
        return redirect()->route('admin.terminals.index')->with('success', 'Terminal deleted successfully');
    }
}
