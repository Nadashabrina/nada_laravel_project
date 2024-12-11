<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class AdminSkillController extends Controller
{
    
    // Menampilkan daftar skill
    public function index()
    {
        // Mengambil semua data skill dari database
        $skills = Skill::all();
        
        // Mengembalikan view dengan data skills
        return view('admin.skill.index', compact('skills'));
    }
    
    // Menampilkan form untuk membuat skill baru
    public function create()
    {
        return view('admin.skill.create');
    }

    // Menyimpan skill baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        // Simpan data skill
        Skill::create($request->only(['name', 'description']));

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('skill.index')->with('success', 'Skill created successfully.');
    }

    // Menampilkan detail skill tertentu
    public function show(Skill $skill)
    {
        return view('admin.skill.show', compact('skill'));
    }

    // Menampilkan form untuk mengedit skill
    public function edit(Skill $skill)
    {
        
        return view('admin.skill.edit', compact('skill'));
    }

    // Memperbarui data skill yang sudah ada
    public function update(Request $request, Skill $skill)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        // Perbarui data skill
        $skill->update($request->only(['name', 'description']));

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('skill.index')->with('success', 'Skill updated successfully.');
    }

    // Menghapus skill
    public function destroy(Skill $skill)
    {
        // Hapus skill dari database
        $skill->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('skill.index')->with('success', 'Skill deleted successfully.');
    }
}
