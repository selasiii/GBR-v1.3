<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // ... existing methods ...

    // List all users
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    // Show the form for creating a new user
    public function create()
    {
        return view('admin.users.create');
    }

    // Store a newly created user in the database
    public function store(Request $request)
    {
        // Validate the request

        // Create the user
        User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            // Add other fields as needed
        ]);

        // Redirect to the user index page or show success message
        return redirect()->route('admin.users.index')->with('success', 'User created successfully');
    }

    // Display the specified user
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    // Show the form for editing the specified user
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    // Update the specified user in the database
    public function update(Request $request, User $user)
    {
        // Validate the request

        // Update the user
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            // Update other fields as needed
        ]);

        // Redirect to the user index page or show success message
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    // Remove the specified user from the database
    public function destroy(User $user)
    {
        $user->delete();

        // Redirect to the user index page or show success message
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully');
    }
}
