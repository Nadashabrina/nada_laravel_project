<?php

// app/Http/Controllers/Admin/CertificateController.php

namespace App\Http\Controllers\Admin; // Menggunakan namespace dengan huruf kapital untuk "Admin"

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificate; // Memastikan namespace model Certificate benar
use Illuminate\Support\Facades\Storage; // Perbaiki import Storage jika perlu

class admincertificateController extends Controller
{
    // Menampilkan daftar certificate
    public function index()
    {
        // Retrieve all certificates
        $certificates = Certificate::all();
        // Return the view with certificate data
        return view('admin.certificate.index', compact('certificates'));
    }

    // Show form to create a new certificate
    public function create()
    {
        // Return the view for creating a certificate
        return view('admin.certificate.create');
    }

    // Store a new certificate
    public function store(Request $request)
{
    // Validate the input data
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'issued_by' => 'required|string|max:255',
        'issued_at' => 'required|date',
        'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // Ensure valid file type and size
        'description' => 'nullable|string|max:1000',
    ]);

    // If a file is uploaded, handle it with move()
    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $destinationPath = public_path('storage/certificates');

        // Ensure the directory exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Generate a unique file name and move the file
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move($destinationPath, $fileName);

        $validated['file'] = 'certificates/' . $fileName; // Store relative path
    }

    // Create a new certificate in the database
    Certificate::create($validated);

    // Redirect with success message
    return redirect()->route('admin.certificate.index')->with('success', 'Certificate created successfully!');
}

    // Show form to edit an existing certificate
    public function edit( $id)
    {
        $certif = Certificate::findOrFail($id);
        
        return view('admin.certificate.certifedit', compact('certif'));
    }
    
    // Update an existing certificate
    public function update(Request $request, Certificate $certificate)
    {
        // Validate the input data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'issued_by' => 'required|string|max:255',
            'issued_at' => 'required|date',
            'file' => 'nullable|file|mimes:pdf,jpg,png|max:2048', // Ensure valid file type and size
            'description' => 'nullable|string|max:1000',
        ]);

        // If a new file is uploaded, store it
        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('certificates', 'public');
        }

        // Update the certificate data
        $certificate->update($validated);

        // Redirect with success message
        return redirect()->route('admin.certificate.index')->with('success', 'Certificate updated successfully!');
    }

    // Delete an existing certificate
    public function destroy(Certificate $certificate)
    {
        // Delete the certificate from the database
        $certificate->delete();

        // Redirect with success message
        return redirect()->route('admin.certificate.index')->with('success', 'Certificate deleted successfully!');
    }
}
