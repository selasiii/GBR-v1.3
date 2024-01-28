<?php

// app/Http/Controllers/PaymentController.php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    // List all payments
    public function index()
    {
        $payments = \App\Payments::all();
        return view('admin.payments.index', compact('payments'));
    }

    // Show the form for creating a new payment
    public function create()
    {
        return view('admin.payments.create');
    }

    // Store a newly created payment in the database
    public function store(Request $request)
    {
        // Validate the request

        // Create the payment
        \App\Payments::create([
            'amount' => $request->input('amount'),
            'date' => $request->input('date'),
            'payment_method' => $request->input('payment_method'),
            'user_id' => $request->input('user_id'),
            // Add other fields as needed
        ]);

        // Redirect to the payment index page or show success message
        return redirect()->route('admin.payments.index')->with('success', 'Payment created successfully');
    }

    // Display the specified payment
    public function show(\App\Payments $payment)
    {
        return view('admin.payments.show', compact('payment'));
    }

    // Show the form for editing the specified payment
    public function edit(\App\Payments $payment)
    {
        return view('admin.payments.edit', compact('payment'));
    }

    // Update the specified payment in the database
    public function update(Request $request, \App\Payments $payment)
    {
        // Validate the request

        // Update the payment
        $payment->update([
            'amount' => $request->input('amount'),
            'date' => $request->input('date'),
            'payment_method' => $request->input('payment_method'),
            'user_id' => $request->input('user_id'),
            // Update other fields as needed
        ]);

        // Redirect to the payment index page or show success message
        return redirect()->route('admin.payments.index')->with('success', 'Payment updated successfully');
    }

    // Remove the specified payment from the database
    public function destroy(\App\Payments $payment)
    {
        $payment->delete();

        // Redirect to the payment index page or show success message
        return redirect()->route('admin.payments.index')->with('success', 'Payment deleted successfully');
    }
}
