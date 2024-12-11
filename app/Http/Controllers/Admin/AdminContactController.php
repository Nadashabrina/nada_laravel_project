<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact; // Memastikan namespace model Contact benar
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;  // Import untuk logging

class AdminContactController extends Controller
{
    // Menampilkan daftar kontak
    public function index()
    {
        $contacts = Contact::all();  // Ambil semua data kontak
        return view('admin.contacts.index', compact('contacts'));  // Tampilkan view dengan data kontak
    }

    // Show form to create a new contact
    public function create()
    {
        // Return the view for creating a contact
        return view('admin.contacts.create');
    }

    // Store a new contact
    public function store(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email',
            'notelp' => 'required|string|max:20',
            'description' => 'nullable|string|max:500',
        ]);

        // Log validated data for debugging
        Log::info('Storing new contact:', $validated);

        try {
            // Create a new contact in the database
            Contact::create($validated);
            
            // Redirect with success message
            return redirect()->route('admin.contacts.index')->with('success', 'Contact created successfully!');
        } catch (\Exception $e) {
            // Log error jika terjadi masalah saat create
            Log::error('Error creating contact:', ['error' => $e->getMessage()]);
            return back()->with('error', 'There was an issue creating the contact. Please try again.');
        }
    }

    // Show form to edit an existing contact
    public function edit($id)
    {
        // Find the contact by id
        $contact = Contact::findOrFail($id);
        
        // Return the view for editing the contact
        return view('admin.contacts.edit', compact('contact'));
    }

    // Update an existing contact
    public function update(Request $request, $id)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,' . $id,
            'notelp' => 'required|string|max:20',
            'description' => 'nullable|string|max:500',
        ]);

        // Find the contact by id
        $contact = Contact::findOrFail($id);

        // Update the contact data
        $contact->update($validated);

        // Redirect with success message
        return redirect()->route('admin.contacts.index')->with('success', 'Contact updated successfully!');
    }

    // Delete an existing contact
    public function destroy($id)
    {
        // Find and delete the contact by id
        $contact = Contact::findOrFail($id);
        $contact->delete();

        // Redirect with success message
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully!');
    }
}
