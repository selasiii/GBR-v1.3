<?php

// app/Http/Controllers/RouteController.php

namespace App\Http\Controllers;

use App\Models\Routes;
use App\Models\Terminals;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    // List all routes
    public function index()
    {
        $routes = \App\Routes::all();
        return view('admin.routes.index', compact('routes'));
    }

    // Show the form for creating a new route
    public function create()
    {
        $terminals = \App\Terminals::all();
        return view('admin.routes.create', compact('terminals'));
    }

    // Store a newly created route in the database
    public function store(Request $request)
    {
        // Validate the request

        // Create the route
        \App\Routes::create([
            'route_name' => $request->input('route_name'),
            'start_terminal_id' => $request->input('start_terminal_id'),
            'end_terminal_id' => $request->input('end_terminal_id'),
            // Add other fields as needed
        ]);

        // Redirect to the route index page or show success message
        return redirect()->route('admin.routes.index')->with('success', 'Route created successfully');
    }

    // Display the specified route
    public function show(\App\Routes $route)
    {
        return view('admin.routes.show', compact('route'));
    }

    // Show the form for editing the specified route
    public function edit(\App\Routes $route)
    {
        $terminals = \App\Terminals::all();
        return view('admin.routes.edit', compact('route', 'terminals'));
    }

    // Update the specified route in the database
    public function update(Request $request, \App\Routes $route)
    {
        // Validate the request

        // Update the route
        $route->update([
            'route_name' => $request->input('route_name'),
            'start_terminal_id' => $request->input('start_terminal_id'),
            'end_terminal_id' => $request->input('end_terminal_id'),
            // Update other fields as needed
        ]);

        // Redirect to the route index page or show success message
        return redirect()->route('admin.routes.index')->with('success', 'Route updated successfully');
    }

    // Remove the specified route from the database
    public function destroy(\App\Routes $route)
    {
        $route->delete();

        // Redirect to the route index page or show success message
        return redirect()->route('admin.routes.index')->with('success', 'Route deleted successfully');
    }
}
