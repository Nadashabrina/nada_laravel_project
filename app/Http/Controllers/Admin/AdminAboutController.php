<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AdminAboutController extends Controller
{
    // Menampilkan halaman About
    public function index()
    {
        // Mengambil data About pertama (jika ada)
        $about = About::first(); 
        
        // Mengirim data ke view 'admin.about.index'
        return view('admin.about.index', compact('about'));
    }

    // Form untuk membuat About
    public function create()
    {
        // Menampilkan form untuk membuat halaman About baru
        return view('admin.about.create');
    }

    // Menyimpan data About
    public function store(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Menyimpan data ke tabel about
        About::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Redirect ke halaman About setelah data disimpan
        return redirect()->route('admin.about.index')->with('success', 'Halaman About berhasil dibuat');
    }

    // Form untuk mengedit About
    public function edit($id)
    {
        // Mengambil data About berdasarkan ID
        $about = About::findOrFail($id);

        return view('admin.about.edit', compact('about'));
    }

    // Memperbarui data About
    public function update(Request $request, $id)
    {
        $about = About::findOrFail($id);

        // Validasi input dari form
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Update data About
        $about->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        // Redirect ke halaman About setelah data diperbarui
        return redirect()->route('admin.about.index')->with('success', 'Halaman About berhasil diperbarui');
    }

    // Menghapus data About
    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        // Redirect kembali ke halaman About setelah dihapus
        return redirect()->route('admin.about.index')->with('success', 'Halaman About berhasil dihapus');
    }
}
