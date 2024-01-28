<?php

// app/Http/Controllers/StaffController.php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // List all staff members
    public function index()
    {
        $staffMembers = \App\Staff::all();
        return view('admin.staff.index', compact('staffMembers'));
    }

    // Show the form for creating a new staff member
    public function create()
    {
        return view('admin.staff.create');
    }

    // Store a newly created staff member in the database
    public function store(Request $request)
    {
        // Validate the request

        // Create the staff member
        \App\Staff::create([
            'user_id' => $request->input('user_id'),
            // Add other fields as needed
        ]);

        // Redirect to the staff index page or show success message
        return redirect()->route('admin.staff.index')->with('success', 'Staff member created successfully');
    }

    // Display the specified staff member
    public function show(\App\Staff $staffMember)
    {
        return view('admin.staff.show', compact('staffMember'));
    }

    // Show the form for editing the specified staff member
    public function edit(\App\Staff $staffMember)
    {
        return view('admin.staff.edit', compact('staffMember'));
    }

    // Update the specified staff member in the database
    public function update(Request $request, \App\Staff $staffMember)
    {
        // Validate the request

        // Update the staff member
        $staffMember->update([
            'user_id' => $request->input('user_id'),
            // Update other fields as needed
        ]);

        // Redirect to the staff index page or show success message
        return redirect()->route('admin.staff.index')->with('success', 'Staff member updated successfully');
    }

    // Remove the specified staff member from the database
    public function destroy(\App\Staff $staffMember)
    {
        $staffMember->delete();

        // Redirect to the staff index page or show success message
        return redirect()->route('admin.staff.index')->with('success', 'Staff member deleted successfully');
    }
}
